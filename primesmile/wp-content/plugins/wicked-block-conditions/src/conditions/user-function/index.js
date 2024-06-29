const { __ } = wp.i18n;
const { TextControl } = wp.components;

const UserFunction = ( { condition, onChange } ) => {
    const { function: func } = condition;

    const handleChange = ( func ) => {
        onChange( {
            'function': func
        } );
    };

    return (
        <TextControl
            label={ __( 'Function', 'wicked-block-conditions' ) }
            help={ __( 'Enter the name of a PHP function to call.  Your function should return a value of true or false.  Any value other than true will be considered false.', 'wicked-block-conditions' ) }
            value={ func }
            onChange={ ( value ) => handleChange( value ) } />
    );
};

export default UserFunction;
