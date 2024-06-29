const { __ } = wp.i18n;
const { map, union, without } = lodash;
const { withSelect } = wp.data;
const { CheckboxControl, Spinner } = wp.components;

const Roles = ( { selectedRoles = [], roles, onChange } ) => {
    const handleChangeRole = ( role, selected ) => {
        const newRoles = selected ? union( selectedRoles, [ role ] ) : without( selectedRoles, role );

        onChange( newRoles );
    }

    if ( roles ) {
        const options = map( roles, role => {
            return (
                <CheckboxControl
                    label={ role.label }
                    checked={ selectedRoles.indexOf( role.value ) !== -1 }
                    onChange={ checked => handleChangeRole( role.value, checked ) } />
            )
        } );

        return (
            <div class="wbc-user-roles">
                { options }
            </div>
        );
    } else {
        return <Spinner />;
    }
};

export default withSelect( ( select, { roles } ) => {
    const { receiveUserRoles } = select( 'wicked-plugins/wicked-block-conditions' );

    return {
        roles: receiveUserRoles()
    };
} )( Roles );
