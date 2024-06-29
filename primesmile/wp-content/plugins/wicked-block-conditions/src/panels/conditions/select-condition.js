import { guid, findCondition, replaceCondition } from '../../util';

const { __ } = wp.i18n;
const { assign, chain, find } = lodash;
const { Fragment } = wp.element;
const { Button } = wp.components;

const SelectCondition = ( props ) => {
    const handleClickCancel = () => {
		props.setState( state => ( { action: 'view-conditions' } ) );
	}

    const handleClickCondition = ( condition ) => {
        let data = {
                action:     props.attributes.wickedBlockConditions.action,
                conditions: props.attributes.wickedBlockConditions.conditions.slice( 0 )
            },
            group = findCondition( data.conditions, props.group );

        const newCondition = assign( {
            guid:       guid(),
            type:       condition.type,
            label:      condition.label,
            operator:   'and',
            conditions: []
        }, condition.default );

        if ( ! group ) {
            group = createGroup();

            data.conditions.push( group );
        }

        group.conditions.push( newCondition );

        data.conditions = replaceCondition( data.conditions, group );

        props.setAttributes( { wickedBlockConditions: data } );

        if ( condition.bypassConfig ) {
            props.setState( state => ( {
                action: 'view-conditions'
            } ) );
        } else {
            props.setState( state => ( {
                action: 'edit-condition',
                activeCondition: newCondition.guid
            } ) );
        }
    }

    const createGroup = () => {
        return {
            guid:       guid(),
            type:       'group',
            label:      __( 'Condition Group', 'wicked-block-conditions' ),
            operator:   'and',
            conditions: []
        };
    }

    const conditions =
        chain( props.wickedBlockConditions.conditions )
        .groupBy( 'group' )
        .map( ( value, key ) => {
            return {
                name: key,
                conditions: value
            };
        } )
        .value();

    const options = conditions.map( group => {
        const children = group.conditions.map( ( condition ) => {
            return (
                <li>
                    <Button
                        isLink={ true }
                        onClick={ () => { handleClickCondition( condition ) } }>{ condition.label }</Button>
                </li>
            );
        } );

        return (
            <Fragment>
                <h3>{ group.name }</h3>
                <ul>
                    { children }
                </ul>
            </Fragment>
        )
    } );

    return (
		<div className="wbc-select-condition">
			<p>{ __( 'Select a condition to add:', 'wicked-block-conditions' ) }</p>
            { options }
			<Button
                variant="secondary"
				onClick={ handleClickCancel }>{ __( 'Cancel', 'wicked-block-conditions' ) }</Button>
		</div>
	)
}

export default SelectCondition;
