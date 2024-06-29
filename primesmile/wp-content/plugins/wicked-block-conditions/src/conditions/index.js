const { __ } = wp.i18n;
const { date } = wp.date;

const Empty = () => {
    return false;
}

import PostHasTerm from './post-has-term';
import PostId from './post-id';
import PostSlug from './post-slug';
import PostStatus from './post-status';
import CurrentDate from './current-date';
import UserHasRole from './user-has-role';
import UserFunction from './user-function';
import QueryString from './query-string';

const conditions = [];

conditions.push( {
    type:           'user_is_logged_in',
    label:          __( 'User Is Logged In', 'wicked-block-conditions' ),
    group:          __( 'User Conditions', 'wicked-block-conditions' ),
    description:    __( 'Returns true if a user is logged in.', 'wicked-block-conditions' ),
    bypassConfig:   true,
    edit:           Empty
} );

conditions.push( {
    type:           'user_is_not_logged_in',
    label:          __( 'User Is Not Logged In', 'wicked-block-conditions' ),
    group:          __( 'User Conditions', 'wicked-block-conditions' ),
    description:    __( 'Returns true if a user is not logged in.', 'wicked-block-conditions' ),
    bypassConfig:   true,
    edit:           Empty
} );

conditions.push( {
    type:           'user_has_role',
    label:          __( 'User Has Role', 'wicked-block-conditions' ),
    group:          __( 'User Conditions', 'wicked-block-conditions' ),
    description:    __( 'Returns true if the user is assigned to any of the selected roles.', 'wicked-block-conditions' ),
    edit:           UserHasRole
} );

conditions.push( {
    type:           'post_id',
    label:          __( 'Check Post ID', 'wicked-block-conditions' ),
    group:          __( 'Post Conditions', 'wicked-block-conditions' ),
    description:    __( 'Returns true if the post has the specified ID.', 'wicked-block-conditions' ),
    bypassConfig:   false,
    edit:           PostId
} );

conditions.push( {
    type:           'post_slug',
    label:          __( 'Check Post Slug', 'wicked-block-conditions' ),
    group:          __( 'Post Conditions', 'wicked-block-conditions' ),
    description:    __( 'Returns true if the post has the specified slug.', 'wicked-block-conditions' ),
    bypassConfig:   false,
    edit:           PostSlug
} );

conditions.push( {
    type:           'post_has_term',
    label:          __( 'Post Has a Term', 'wicked-block-conditions' ),
    group:          __( 'Post Conditions', 'wicked-block-conditions' ),
    description:    __( 'Returns true if the post has the selected term(s) assigned.', 'wicked-block-conditions' ),
    bypassConfig:   false,
    edit:           PostHasTerm
} );

conditions.push( {
    type:           'post_status',
    label:          __( 'Check Post Status', 'wicked-block-conditions' ),
    group:          __( 'Post Conditions', 'wicked-block-conditions' ),
    description:    __( 'Returns true if post status matches the selected option.', 'wicked-block-conditions' ),
    bypassConfig:   false,
    edit:           PostStatus,
    default:        {
        status: 'publish',
    }
} );

conditions.push( {
    type:           'current_date',
    label:          __( "Check The Date", 'wicked-block-conditions' ),
    group:          __( 'Date Conditions', 'wicked-block-conditions' ),
    description:    __( 'Returns true if the current date matches the specified conditions.', 'wicked-block-conditions' ),
    bypassConfig:   false,
    edit:           CurrentDate,
    default:        {
        compare:    'before',
        date:       date( 'Y-m-d H:i:00', new Date() )
    }
} );

conditions.push( {
    type:           'user_function',
    label:          __( 'Check a User-Defined Function', 'wicked-block-conditions' ),
    group:          __( 'Advanced', 'wicked-block-conditions' ),
    description:    __( 'Returns the result of a user-defined function.', 'wicked-block-conditions' ),
    bypassConfig:   false,
    edit:           UserFunction
} );

conditions.push( {
    type:           'query_string',
    label:          __( 'Check a Query String Value', 'wicked-block-conditions' ),
    group:          __( 'Advanced', 'wicked-block-conditions' ),
    description:    __( 'Returns true if the specified query string parameter is matched.', 'wicked-block-conditions' ),
    bypassConfig:   false,
    edit:           QueryString,
    default:        {
        parameter:  '',
        value:      ''
    }
} );

export { conditions };
