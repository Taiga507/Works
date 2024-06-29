const { Fragment } = wp.element;

import Taxonomy from './taxonomy';
import Terms from './terms';

const PostHasTerm = ( { condition, onChange } ) => {
    const { taxonomy, terms } = condition;
    
    const handleChangeTaxonomy = ( taxonomy ) => {
        onChange( {
            taxonomy:   taxonomy,
            terms:      terms
        } );
    }

    const handleChangeTerms = ( terms ) => {
        onChange( {
            taxonomy:   taxonomy,
            terms:      terms
        } );
    }

    return (
        <Fragment>
            <Taxonomy
                selectedTaxonomy={ taxonomy }
                onChange={ handleChangeTaxonomy } />
            <Terms
                taxonomy={ taxonomy }
                selectedTerms={ terms }
                onChange={ handleChangeTerms } />
        </Fragment>
    );
};

export default PostHasTerm;
