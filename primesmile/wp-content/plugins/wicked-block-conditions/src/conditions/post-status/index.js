const { __ } = wp.i18n;
const { RadioControl } = wp.components;

const PostStatus = ( { condition, onChange } ) => {
    const { status } = condition;

    const handleChange = ( status ) => {
        onChange( {
            status: status
        } );
    };

    return (
        <RadioControl
    		label={ __( 'Post Status', 'wicked-block-conditions' ) }
    		selected={ status }
    		options={ [
    			{ label: __( 'Published', 'wicked-block-conditions' ), value: 'publish' },
                { label: __( 'Pending', 'wicked-block-conditions' ), value: 'pending' },
                { label: __( 'Draft', 'wicked-block-conditions' ), value: 'draft' },
                { label: __( 'Future', 'wicked-block-conditions' ), value: 'future' },
                { label: __( 'Private', 'wicked-block-conditions' ), value: 'private' },
    			{ label: __( 'Password Protected', 'wicked-block-conditions' ), value: 'password' },
    		] }
    		onChange={ ( option ) => { handleChange( option ) } } />
    );
};

export default PostStatus;
