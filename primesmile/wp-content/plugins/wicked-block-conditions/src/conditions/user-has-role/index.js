import Roles from './roles';

const UserHasRole = ( { condition, onChange } ) => {
    const { roles } = condition;

    const handleChangeRoles = ( roles ) => {
        onChange( {
            roles: roles
        } );
    };

    return (
        <Roles
            selectedRoles={ roles }
            onChange={ handleChangeRoles } />
    );
};

export default UserHasRole;
