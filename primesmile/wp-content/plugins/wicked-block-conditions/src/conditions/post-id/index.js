const { __ } = wp.i18n;
const { TextControl } = wp.components;

const PostId = ( { condition, onChange } ) => {
    const { postId } = condition;

    const handleChange = ( postId ) => {
        onChange( {
            postId: parseInt( postId )
        } );
    };

    return (
        <TextControl
            label={ __( 'Post ID', 'wicked-block-conditions' ) }
            type="number"
            min={ 1 }
            step={ 1 }
            value={ postId }
            onChange={ handleChange } />
    );
};

export default PostId;
