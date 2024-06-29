import Main from './main'
import SelectCondition from './select-condition'
import EditCondition from './edit-condition'
import { SliderPanels, SliderPanel } from './../../components/slider-panels'
import { conditions } from './../../conditions/index'
import * as data from './../../data'

const { __ } = wp.i18n;
const { assign } = lodash;
const { Fragment, useState } = wp.element;
const { PanelBody } = wp.components;
const { createHigherOrderComponent } = wp.compose;
const { InspectorControls } = wp.blockEditor;
const { addFilter, applyFilters } = wp.hooks;

addFilter( 'blocks.registerBlockType', 'wicked-block-conditions/add-attribute', registerBlockTypeFilter );
addFilter( 'blocks.getSaveContent.extraProps', 'wicked-block-conditions/add-props', extraPropsFilter );

function registerBlockTypeFilter( settings ) {
	settings.attributes = assign( settings.attributes, {
        wickedBlockConditions: {
            type: 'object',
            default: {
                action: 'show',
                conditions: [],
            }
        }
	} );

	return settings;
}

function extraPropsFilter( extraProps, blockType, attributes ) {
	extraProps.wickedBlockConditions = attributes.wickedBlockConditions;

	return extraProps;
}

const ConditionsPanel = ( ( props ) => {
	const [ isOpen, setIsOpen ] = useState( false );
	const [ action, setAction ] = useState( 'view-conditions' );
	const [ activeCondition, setActiveCondition ] = useState( null );
	const [ group, setGroup ] = useState( null );
		
	const handleTogglePanel = () => {
		setIsOpen( ! isOpen );
	}

	// Replacement for deprecated withState HOC
	const setState = state => {
		const data = state();

		if ( data.hasOwnProperty( 'action' ) ) {
			setAction( data.action );
		}

		if ( data.hasOwnProperty( 'activeCondition' ) ) {
			setActiveCondition( data.activeCondition );
		}

		if ( data.hasOwnProperty( 'group' ) ) {
			setGroup( data.group );
		}
	}

	const childProps = {
		...props,
		action: 			action,
		activeCondition: 	activeCondition,
		group: 				group,
		setState: 			setState,
	}

    return (
        <InspectorControls>
            <PanelBody
				title={ __( 'Display Conditions', 'wicked-block-conditions' ) }
				initialOpen={ isOpen }
				onToggle={ handleTogglePanel }>
				<SliderPanels activePanel={ action }>
					<SliderPanel name="view-conditions">
						<Main { ...childProps } />
					</SliderPanel>
					<SliderPanel name="select-condition">
						<SelectCondition { ...childProps } />
					</SliderPanel>
					<SliderPanel name="edit-condition">
						<EditCondition { ...childProps } />
					</SliderPanel>
				</SliderPanels>
            </PanelBody>
        </InspectorControls>
    )
} )

const withConditions = createHigherOrderComponent( ( BlockEdit ) => {
	const wickedBlockConditions = {
		conditions: applyFilters( 'wickedBlockConditions.conditions', conditions )
	}

    return ( props ) => {
        return (
            <Fragment>
                <BlockEdit { ...props } />
                <ConditionsPanel { ...props } wickedBlockConditions={ wickedBlockConditions } />
            </Fragment>
        );
    };
}, 'withConditions' );

export default withConditions;
