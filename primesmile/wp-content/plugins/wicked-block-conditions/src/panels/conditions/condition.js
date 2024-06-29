import Conditions from './conditions'

const { __ } = wp.i18n;
const { Button, Icon } = wp.components;

const Condition = ( props ) => {
    let groupBody = false;
    const condition = props.condition;
    const type = condition.type;

    const handleChangeConditions = ( conditions ) => {
        const condition = Object.assign( {}, props.condition );

        condition.conditions = conditions;

        props.onChange( condition );
    }

    const handleChangeOperator = ( e ) => {
        const condition = Object.assign( {}, props.condition );

        condition.operator = e.target.value;

        props.onChange( condition );
    }

    const handleAddCondition = ( condition ) => {
        props.setState( state => ( {
            action:     'select-condition',
            group:      condition.guid
        } ) );
	}

    const handleEditCondition = () => {
        props.setState( state => ( {
            action:             'edit-condition',
            activeCondition:    condition.guid
        } ) );
    }

    const handleClickDeleteGroup = () => {
        if ( condition.conditions.length ) {
            if ( confirm( __( 'This will delete all conditions in the group.  Are you sure?', 'wicked-block-conditions' ) ) ) {
                props.onDelete( condition );
            }
        } else {
            props.onDelete( condition );
        }
    }

    const operatorControl = 0 == props.index ? false : (
        <div className="wbc-operator">
            <div>
                <select defaultValue={ condition.operator } onChange={ handleChangeOperator }>
                    <option value="and">{ __( 'And', 'wicked-block-conditions' ) }</option>
                    <option value="or">{ __( 'Or', 'wicked-block-conditions' ) }</option>
                </select>
            </div>
        </div>
    );

    if ( condition.conditions.length ) {
        groupBody = (
            <Conditions
                setState={ props.setState }
                conditions={ condition.conditions }
                onChange={ handleChangeConditions } />
        );
    } else {
        groupBody = (
            <p className="wbc-empty-group">{ __( 'This group does not have any conditions yet.', 'wicked-block-conditions' ) }</p>
        )
    }

    if ( 'group' == type ) {
        return (
            <li className="wbc-group-condition" data-guid={ condition.guid }>
                { operatorControl }
                <div className="wbc-content">
                    <div className="wbc-head">
                        <h3>{ __( 'Condition Group', 'wicked-block-conditions' ) }</h3>
                    </div>
                    <div className="wbc-body">
                        { groupBody }
                    </div>
                    <div className="wbc-foot">
                        <Button
            				isLink={ true }
            				onClick={ () => { handleAddCondition( condition ) } }>{ __( 'Add Condition', 'wicked-block-conditions' ) }</Button>
                        <span className="wbc-separator">|</span>
                        <Button
                            isLink={ true }
                            onClick={ handleClickDeleteGroup }>{ __( 'Delete Group', 'wicked-block-conditions' ) }</Button>
                    </div>
                </div>
            </li>
        );
    } else {
        return (
            <li className="wbc-condition" data-guid={ condition.guid }>
                { operatorControl }
                <div className="wbc-content">
                    { condition.label }
                </div>
                <div className="wbc-edit">
                    <Button onClick={ () => { handleEditCondition( condition ) } }>
                        <Icon icon="admin-generic" size="20" />
                    </Button>
                </div>
            </li>
        )
    }
}

export default Condition;
