const { __ } = wp.i18n;
const { TextControl } = wp.components;

const PostSlug = ( { condition, onChange } ) => {
    const { slug } = condition;

    const handleChange = ( slug ) => {
        onChange( {
            slug: slug
        } );
    };

    return (
        <TextControl
            label={ __( 'Post Slug', 'wicked-block-conditions' ) }
            value={ slug }
            onChange={ handleChange } />
    );
};

export default PostSlug;
