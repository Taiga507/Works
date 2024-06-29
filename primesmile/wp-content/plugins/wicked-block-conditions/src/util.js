const { find, forEach, isUndefined, filter } = lodash;

const findCondition = ( conditions, guid ) => {
    let condition = false;

    condition = find( conditions, item => item.guid == guid );

    if ( ! condition ) {
        forEach( conditions, item => {
            const found = findCondition( item.conditions, guid );

            if ( found ) condition = found;
        } );
    }

    return condition;
}

const replaceCondition = ( conditions, condition ) => {
    return conditions.map( existingCondition => {
        if ( existingCondition.guid == condition.guid ) {
            return condition;
        } else {
            if ( ! isUndefined( existingCondition.conditions ) ) {
                existingCondition.conditions = replaceCondition( existingCondition.conditions, condition );
            }

            return existingCondition;
        }
    } );
}

const removeCondition = ( conditions, condition ) => {
    let items = filter( conditions, existingCondition => existingCondition.guid != condition.guid );

    return items.map( item => {
        if ( ! isUndefined( item.conditions ) ) {
            item.conditions = removeCondition( item.conditions, condition );
        }

        return item;
    } );
}

const guid = function() {
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c){
        var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(16);
    });
};

export { findCondition, replaceCondition, removeCondition, guid }
