import { guid } from '../../util';
import DisplayAction from './display-action'
import Conditions from './conditions'

const { __ } = wp.i18n;
const { assign } = lodash;
const { Fragment } = wp.element;
const { Button } = wp.components;

const Main = ( props ) => {
	const { action, conditions } = props.attributes.wickedBlockConditions;
	const config = assign( {}, props.attributes.wickedBlockConditions );

    const addConditionGroup = () => {
        const condition = {
            guid:       guid(),
            type:       'group',
            label:      __( 'Condition Group', 'wicked-block-conditions' ),
            operator:   'and',
            conditions: []
        };

        config.conditions = config.conditions.slice( 0 );
        config.conditions.push( condition );

        props.setAttributes( { wickedBlockConditions: config } );

        return condition;
    }

	const handleChangeDisplayAction = ( option ) => {
		config.action = option;

		props.setAttributes( { wickedBlockConditions: config } );
	}

	const handleChangeConditions = ( conditions ) => {
		config.conditions = conditions;

		props.setAttributes( { wickedBlockConditions: config } );
	}

	const handleClickAddCondition = () => {
		props.setState( state => ( {
			action: 'select-condition'
		} ) );
	}

    const handleClickAddConditionGroup = () => {
        addConditionGroup();
    }

	if ( conditions.length ) {
		return (
			<Fragment>
				<DisplayAction
					option={ action }
					onChange={ handleChangeDisplayAction } />
				<Conditions
					setState={ props.setState }
					conditions={ conditions }
					onChange={ handleChangeConditions }
					className="wbc-conditions" />
				<p>
					<Button
						isLink={ true }
						onClick={ handleClickAddConditionGroup }>{ __( 'Add Condition Group', 'wicked-block-conditions' ) }</Button>
				</p>
			</Fragment>
		);
	} else {
		return (
			<div className="wbc-start">
                <p>{ __( 'Show or hide this block based on conditions.  Add a condition to get started.', 'wicked-block-conditions' ) }</p>
                <p>
    				<Button
    					isLink={ true }
    					onClick={ handleClickAddCondition }>
                            { __( 'Add Condition', 'wicked-block-conditions' ) }
                    </Button>
                </p>
			</div>
		);
	}
}

export default Main;
