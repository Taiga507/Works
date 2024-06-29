const { __ } = wp.i18n;
const { map, filter, find, union, without } = lodash;
const { withSelect } = wp.data;
const { CheckboxControl, FormTokenField } = wp.components;

const Terms = ( { taxonomy, selectedTerms = [], taxonomyObject, terms, onChange } ) => {
    const handleChangeTerm = ( slug, selected ) => {
        const newTerms = selected ? union( selectedTerms, [ slug ] ) : without( selectedTerms, slug );

        onChange( newTerms );
    }

    const handleChangeTags = ( tags ) => {
        const newTerms = map( tags, tag => {
            let term = find( terms, { name: tag } );

            return term ? term.slug : tag;
        } );

        onChange( newTerms );
    }

    const renderHierarchicalTerms = ( parent = 0 ) => {
        return map( terms, term => {
            if ( term.parent != parent ) return false;

            return (
                <div key={ term.id } className="editor-post-taxonomies__hierarchical-terms-choice">
                    <CheckboxControl
                        label={ term.name }
                        checked={ selectedTerms.indexOf( term.slug ) !== -1 }
                        onChange={ checked => handleChangeTerm( term.slug, checked ) }
                    />
                    <div className="editor-post-taxonomies__hierarchical-terms-subchoices">
                        { renderHierarchicalTerms( term.id ) }
                    </div>
                </div>
            );
        } );
    }

    if ( taxonomyObject && terms ) {
        if ( taxonomyObject.hierarchical ) {
            return (
                <div class="wbc-terms">
                    <h3>{ __( 'Terms', 'wicked-block-conditions' ) }</h3>
                    { renderHierarchicalTerms() }
                </div>
            );
        } else {
            const suggestions = map( terms, term => term.name );
            const value = map(
                filter( terms, term => selectedTerms.indexOf( term.slug ) !== -1 ),
                term => term.name
            );

            return (
                <div class="wbc-terms">
                    <FormTokenField
                        value={ value }
                        suggestions={ suggestions }
                        maxSuggestions={ 20 }
                        label={ __( 'Tags', 'wicked-block-conditions' ) }
                        onChange={ handleChangeTags } />
                </div>
            );
        }
    } else {
        return false;
    }
};

export default withSelect( ( select, { taxonomy } ) => {
    const { getTaxonomy, getEntityRecords } = select( 'core' );

    return {
        taxonomyObject: taxonomy ? getTaxonomy( taxonomy ) : undefined,
        terms: taxonomy ? getEntityRecords( 'taxonomy', taxonomy ): undefined,
    };
} )( Terms );
