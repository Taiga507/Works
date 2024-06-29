const { __ } = wp.i18n;
const { map, filter } = lodash;
const { withSelect } = wp.data;
const { SelectControl } = wp.components;

const Taxonomy = withSelect( ( select ) => {
    const post = select( 'core/editor' ).getCurrentPost();

    return {
        post: post,
        taxonomies: post ? select( 'core' ).getTaxonomies() : undefined,
    }
} )( ( { taxonomies, post, selectedTaxonomy, onChange } ) => {
    if ( taxonomies ) {
        const filteredTaxonomies = filter( taxonomies, taxonomy => taxonomy.types.indexOf( post.type ) !== -1 );

        let options = map( filteredTaxonomies, taxonomy => {
            return {
                value: taxonomy.slug,
                label: taxonomy.name
            }
        } );

        options.unshift( { value: '', label: __( 'Select a taxonomy', 'wicked-block-conditions' ) } );

        if ( filteredTaxonomies.length ) {
            return (
                <SelectControl
                    label={ __( 'Taxonomy', 'wicked-block-conditions' ) }
                    value={ selectedTaxonomy }
                    onChange={ onChange }
                    options={ options } />
            )
        } else {
            return (
                <p>{ __( 'No terms can be selected because this post type does not have any taxonomies assigned to it.', 'wicked-block-conditions' ) }</p>
            )
        }

    } else {
        return (
            <div>{ __( 'Loading...', 'wicked-block-conditions' ) }</div>
        )
    }
} );

export default Taxonomy;
