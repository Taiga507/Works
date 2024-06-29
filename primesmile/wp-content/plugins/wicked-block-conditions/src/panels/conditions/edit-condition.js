import { findCondition, replaceCondition, removeCondition } from '../../util';

const { __ } = wp.i18n;
const { TextControl, ToggleControl, Button } = wp.components;
const { find, assign } = lodash;

const EditCondition = ( props ) => {
    let condition = findCondition( props.attributes.wickedBlockConditions.conditions, props.activeCondition );
    const conditionType = find( props.wickedBlockConditions.conditions, { type: condition.type } );
    const config = Object.assign( {}, props.attributes.wickedBlockConditions );
    const Edit = conditionType.edit;

    const handleChangeCondition = ( data ) => {
        condition = assign( {}, condition, data );

        updateCondition();
    }

    const handleChangeNegate = value => {
        condition.negate = value;

        updateCondition();
    }

    const handleClickSaveCondition = () => {
        props.setState( state => ( { action: 'view-conditions', activeCondition: null } ) );
    }

    const handleClickDeleteCondition = () => {
        config.conditions = removeCondition( config.conditions, condition );

        props.setAttributes( { wickedBlockConditions: config } );

        props.setState( state => ( { action: 'view-conditions', activeCondition: null } ) );
    }

    const handleChangeLabel = label => {
        condition.label = label;

        updateCondition();
    }

    const updateCondition = () => {
        config.conditions = replaceCondition( config.conditions, condition );

        props.setAttributes( { wickedBlockConditions: config } );
    }

    return (
        <div className="wbc-edit-condition">
            <h3>{ props.isNew ? __( 'Add Condition', 'wicked-block-conditions' ) : __( 'Edit Condition', 'wicked-block-conditions' ) }: { conditionType.label }</h3>
            <p>{ conditionType.description }</p>
            <TextControl
                label={ __( 'Label', 'wicked-block-conditions' ) }
                help={ __( 'Briefly explain what this condition does.', 'wicked-block-conditions' ) }
                value={ condition.label }
                onChange={ ( value ) => handleChangeLabel( value ) } />
            <ToggleControl
                label={ __( 'Negate condition', 'wicked-block-conditions' ) }
                checked={ condition.negate }
                help={ __( 'Reverses the outcome of the condition.', 'wicked-block-conditions' ) }
                onChange={ handleChangeNegate } />
            <Edit
                condition={ condition }
                onChange={ handleChangeCondition } />
            <div className="wbc-foot">
                <div className="wbc-save">
                    <Button
                        isPrimary={ true }
                        onClick={ handleClickSaveCondition }>
                        { __( 'Save', 'wicked-block-conditions' ) }
                    </Button>
                </div>
                <div className="wbc-delete">
                    <Button
                        variant="secondary"
                        isDestructive={ true }
                        onClick={ handleClickDeleteCondition }>
                        { __( 'Delete', 'wicked-block-conditions' ) }
                    </Button>
                </div>
            </div>
        </div>
    )
}

export default EditCondition
