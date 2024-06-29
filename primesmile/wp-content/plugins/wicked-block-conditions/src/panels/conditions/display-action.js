const { __ } = wp.i18n;
const { RadioControl } = wp.components;

const DisplayAction = ( { option, onChange } ) => {
    return (
        <RadioControl
            label={ __( 'When conditions are met:', 'wicked-block-conditions' ) }
            selected={ option }
            options={ [
                { label: __( 'Show this block', 'wicked-block-conditions' ), value: 'show' },
                { label: __( 'Hide this block', 'wicked-block-conditions' ), value: 'hide' },
            ] }
            onChange={ ( option ) => { onChange( option ) } }
        />
    )
}

export default DisplayAction;
