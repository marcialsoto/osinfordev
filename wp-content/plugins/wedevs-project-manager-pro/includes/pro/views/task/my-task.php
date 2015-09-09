<?php
global $current_user;
$this_user = true;
$disabled = '';

if( isset( $_GET['user_id'] ) && ! empty( $_GET['user_id'] ) ) {
    if( ! cpm_manage_capability() &&  $current_user->ID != $_GET['user_id'] ) {
        printf( '<h1>%s</h1>', __( 'You do no have permission to access this page', 'cpm' ) );
        return;
    }
    if( $current_user->ID != $_GET['user_id'] ) {
        $this_user = false;
    } 
    $current_user = get_user_by( 'id', $_GET['user_id'] );
    $title = sprintf( "%s's tasks", $current_user->display_name );
} else {
    $title = __( 'My Tasks', 'cpm' );
}

$task = CPM_Task::getInstance();
$project = $task->get_mytasks( $current_user->ID );
$count = $task->mytask_count();

$count = array(
       'Current Task' =>  $count['current_task'],
       'Outstanding Task' =>  $count['outstanding'],
       'Completed Task' =>  $count['complete']
    );

if ( isset( $_GET['subtab'] ) && $_GET['subtab'] == 'outstanding' ) {
    $page_status = 'Outstanding Task';
} else if ( isset( $_GET['subtab'] ) && $_GET['subtab'] == 'complete' ) {
    $page_status ='Completed Task';
} else {
    $page_status = 'Current Task';
}

/*if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'outstanding' ) {
    $page_status = 'outstanding';
} else if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'complete' ) {
    $page_status = 'complete';
} else {
    $page_status = '';
}*/

?>

<div class="wrap cpm my-tasks">
    <h2></h2>
   
    <?php CPM_Task::getInstance()->my_task_header_tab( 'Task' );  ?>
    <h3 class="cpm-nav-title">
       <?php CPM_Task::getInstance()->my_task_header_subtab( $page_status, $count );  ?>     
    </h3>
</div>

<div class="wrap cpm my-tasks">  
 
    <h3 class="cpm-no-task" style="display:none;"><?php //_e( 'No task found', 'cpmtt' ); ?></h3>

    <?php if ( $project ) { ?>

        <ul class="cpm-todolists cpm-my-todolists">

            <?php foreach ($project as $project_id => $project_obj) { ?>
                <li>
                    <article class="cpm-user-task cpm-todolist">
                        <header class="cpm-list-header">
                            <h3><a href="<?php echo cpm_url_tasklist_index( $project_id ); ?>"><?php echo $project[$project_id]['title']; ?></a></h3>
                        </header>                        
                        <?php if ( $page_status != 'Completed Task' ) { 
                            //$page_status != 'completed'
                        ?>
                        
                            <ul class="cpm-todos cpm-uncomplete-mytask ui-sortable"> 

                                <?php
                                foreach ($project_obj['tasks'] as $task) {
                                    $start_date = isset( $task->start_date ) ? $task->start_date : '';
                                    ?>
                                    <li>
                                        <div class="cpm-todo-wrap cpm-task-uncomplete">
                                            <span class="cpm-spinner"></span>
                                            <?php if( $this_user === true ) { ?>
                                                <input type="checkbox"  class="cpm-uncomplete"  name="" data-single="0" data-project="<?php echo $project_id; ?>" data-list="<?php echo $task->task_list_id; ?>" value="<?php echo $task->task_id; ?>">
                                            <?php } ?>
                                            <span class="cpm-todo-content">
                                                <a href="<?php echo cpm_url_single_task( $project_id, $task->task_list_id, $task->task_id ); ?>">
                                                    <span class="cpm-todo-text"><?php echo $task->task; ?></span>
                                                </a>
                                                <?php if ( (int) $task->comment_count > 0 ) { ?>

                                                    <span class="cpm-comment-count">
                                                        <a href="<?php echo cpm_url_single_task( $project_id, $task->task_list_id, $task->task_id ); ?>">
                                                            <?php printf( _n( __( '1 Comment', 'cpm' ), __( '%d Comments', 'cpm' ), $task->comment_count, 'cpm' ), $task->comment_count ); ?>
                                                        </a>
                                                    </span>
                                                <?php } ?>
                                                <span class="cpm-assign-by">
                                                    <?php echo $current_user->display_name; ?>
                                                </span>
                                                <?php
                                                if ( $start_date != '' || $task->due_date != '' ) {
                                                    ?>
                                                    <span class="cpm-due-date">
                                                        <?php
                                                        if ( ( cpm_get_option( 'task_start_field' ) == 'on' ) && $start_date != '' ) {
                                                            echo cpm_get_date( $start_date );
                                                        }
                                                        if ( $start_date != '' & $task->due_date != '' ) {
                                                            echo ' - ';
                                                        }
                                                        if ( $task->due_date != '' ) {
                                                            echo cpm_get_date( $task->due_date );
                                                        }
                                                        ?>
                                                    </span>

                                                <?php } ?>

                                            </span>

                                            <?php 
                                            if( $this_user === true ) { 
                                                do_action( 'my_task_after', $task, $project_id, $task->task_list_id ); 
                                            }

                                            ?>
                                        </div>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                            <?php
                        }
                        if ( $page_status == 'Completed Task' ) {
                            //$page_status == 'completed'
                            ?>
                            <ul class="cpm-todo-completed">

                                <?php
                                foreach ($project_obj['tasks'] as $task) {
                                    ?>
                                    <li>    
                                        <div class="cpm-todo-wrap cpm-task-complete">
                                            <span class="cpm-spinner"></span>
                                            <?php if( $this_user === true ) { ?>
                                                <input type="checkbox" <?php echo $disabled; ?>  class="cpm-complete" <?php checked( $task->completed, '1' ); ?> name="" value="<?php echo $task->task_id; ?>" data-project="<?php echo $project_id; ?>" data-list="<?php echo $task->task_list_id; ?>" data-single="0">
                                            <?php } ?>
                                            <span class="cpm-todo-content">
                                                <a href="<?php echo cpm_url_single_task( $project_id, $task->task_list_id, $task->task_id ); ?>">
                                                    <span class="cpm-todo-text"><?php echo $task->task; ?></span>
                                                </a>
                                                <?php if ( (int) $task->comment_count > 0 ) { ?>

                                                    <span class="cpm-comment-count">
                                                        <a href="<?php echo cpm_url_single_task( $project_id, $task->task_list_id, $task->task_id ); ?>">
                                                            <?php printf( _n( __( '1 Comment', 'cpm' ), __( '%d Comments', 'cpm' ), $task->comment_count, 'cpm' ), $task->comment_count ); ?>
                                                        </a>
                                                    </span>
                                                <?php } ?>

                                                <?php
                                                $completion_time = cpm_get_date( get_post_meta( $task->task_id, '_completed_on', true ), true );
                                                ?>

                                                <span class="cpm-completed-by">
                                                    <?php printf( __( '(Completed by %s on %s)', 'cpm' ), $current_user->display_name, $completion_time ) ?>
                                                </span>

                                            </span>
                                        </div>

                                    </li>
                                    <?php
                                }
                                ?>

                            </ul>
                        <?php } ?>
                    </article>
                </li>
                <?php
            }
            ?>
        </ul>
        <?php
    } else {
        ?>
        <h3><?php _e( 'No task found', 'cpmtt' ); ?></h3>
        <?php
    }
    ?>
</div>