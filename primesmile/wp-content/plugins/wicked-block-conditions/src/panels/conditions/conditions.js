import Condition from './condition'

const Conditions = ( props ) => {
    const handleChangeCondition = ( changedCondition ) => {
        const conditions = props.conditions.map( condition => {
            if ( condition.guid == changedCondition.guid ) {
                return changedCondition;
            } else {
                return condition;
            }
        } );

        props.onChange( conditions );
    }

    const handleDeleteCondition = ( deletedCondition ) => {
        const conditions = props.conditions.filter( condition => {
            return condition.guid != deletedCondition.guid;
        } );

        props.onChange( conditions );
    }

    const conditions = props.conditions.map( ( condition, index ) => {
        return (
            <Condition
                { ...props }
                key={ condition.guid }
                index={ index }
                condition={ condition }
                onChange={ handleChangeCondition }
                onDelete={ handleDeleteCondition } />
        );
    } );

    return (
        <ul className={ props.className || '' }>
            { conditions }
        </ul>
    )
}

export default Conditions;
