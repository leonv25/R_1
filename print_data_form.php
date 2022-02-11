<?php
    $json = ['25', '55'];

     echo json_encode($json);





    // function db_conect() {
    //     include "variables.php";
        
    //     if(isset($_POST[$arr_form_name[0]])) {
    //         //обробка та захист вводу
    //         $user_input = htmlspecialchars($_POST[$arr_form_name[0]], ENT_QUOTES, 'UTF-8');//запис даних input в змінну із функцією захисту
    //         $arr_user_input = explode("-", mb_strtolower(trim($user_input)));//функція із рядка формує масив(переводить всі букви в низький регістр(видаляє до початку символів і після символів усі пробіли))
    //         for($i = 0; $i<count($arr_user_input); $i++) {
    //             $arr_user_input[$i] = trim($arr_user_input[$i]);//забирає пробіли в кожному елементі масиву
    //         }

    //         //валідація назви таблиці
    //         for($i = 0; $i<count($arr_stn_code_tab); $i++) {
    //             preg_match($arr_stn_code_tab[$i], $arr_user_input[0], $matches);
    //             if(isset($matches[0])) {
    //                 $bd_table_name = preg_replace($arr_stn_code_tab_class[$i], $arr_db_tab_class[$i], $matches[0]);//формування правильної назви таблиці даних
    //                 break;
    //             } 
    //         }
    //         //валідація назви групи
    //         if(isset($arr_user_input[1])) {
    //             preg_match($stn_code_group, $arr_user_input[1], $matches_group);
    //             if(isset($matches_group[0])) {
    //                 $bd_table_group_id = $matches_group[0];//номер групи таблиці після валідацій
    //             }
    //         }
    //         //валідація назви норми
    //         if(isset($arr_user_input[2])) {
    //             preg_match($stn_code_norm, $arr_user_input[2], $matches_norm);
    //             if(isset($matches_norm[0])) {
    //                 $bd_table_norm_id = $matches_norm[0];//номер норми групи таблиці після валідацій
    //             }
    //         }
    //     }
    //     //////////////////////////////////////////////////
    //     //підключення бази даних
    //     if(isset($bd_table_name)) {
    //         $mysqli = new mysqli($db_port, $db_login, $db_password, $db_name);
    //         if(mysqli_connect_errno()) {
    //             printf("Зєднання не встановлено", mysqli_connect_error());
    //             exit();
    //         }
    //         $mysqli->set_charset('utf8');

    //         $show_table = $mysqli->query("SHOW TABLES LIKE '$bd_table_name'");
    //         $show_table_name = mysqli_fetch_assoc($show_table);
    //         if(isset($show_table_name)) {
    //             //перевірка на те чи є в таблиці вказана група
    //             if(isset($bd_table_group_id)) {
    //                 $search_group_id = $mysqli->query("SELECT $arr_db_table_column_name[0] FROM $bd_table_name WHERE $arr_db_table_column_name[0] = $bd_table_group_id");
    //                 $result_group_id = mysqli_fetch_assoc($search_group_id);
    //                 if(isset($result_group_id)) {
    //                     if(isset($bd_table_norm_id)) {
    //                         //перевірка на те чи є в групі цієї таблиці вказана норма
    //                         $search_norm_id = $mysqli->query("SELECT `$bd_table_norm_id` FROM $bd_table_name WHERE $arr_db_table_column_name[0]=$bd_table_group_id AND $arr_db_table_column_name[4]=$db_table_column_name_data;");
    //                         $arr_result_norm_id = mysqli_fetch_assoc($search_norm_id);
    //                         $result_norm_id = $arr_result_norm_id[$bd_table_norm_id];
    //                         if(isset($result_norm_id) && $result_norm_id != "") {
    //                             $search_part_bd_table_single = $mysqli->query("SELECT $arr_db_table_column_name_single[0], $arr_db_table_column_name_single[1], $arr_db_table_column_name_single[2], $arr_db_table_column_name_single[3] FROM $bd_table_name WHERE $arr_db_table_column_name[0]=$bd_table_group_id;");
    //                             $search_part_bd_table_many = $mysqli->query("SELECT $arr_db_table_column_name_many[0], $arr_db_table_column_name_many[1], $arr_db_table_column_name_many[2], `$bd_table_norm_id` FROM $bd_table_name WHERE $arr_db_table_column_name[0]=$bd_table_group_id;");
                                
    //                             $row_part_bd_table_single = mysqli_fetch_assoc($search_part_bd_table_single);
    //                             while ($row_part_bd_table_many = mysqli_fetch_assoc($search_part_bd_table_many)) {
    //                                 for($i = 0; $i < count($arr_db_table_column_name_many); $i++) {
    //                                     $json_many[$arr_db_table_column_name_many[$i]][] = [$row_part_bd_table_many[$arr_db_table_column_name_many[$i]]][0];
    //                                 }
    //                                 $json_many['norm'][] = [$row_part_bd_table_many[$bd_table_norm_id]][0];
    //                             }
    //                             $mysqli->close();

    //                             for($i = 0; $i < count($arr_db_table_column_name_single); $i++) {
    //                                 $json_single[$arr_db_table_column_name_single[$i]] = $row_part_bd_table_single[$arr_db_table_column_name_single[$i]];
    //                             }
                            
    //                             $json = array_merge($json_single, $json_many);
    //                             echo json_encode('$json_single');
    //                         } else {
    //                             echo 'задана норма групи для цієї таблиці відсутня';
    //                             $mysqli->close();
    //                         }
    //                     } else {
    //                         echo 'не задано норми';
    //                         $mysqli->close();
    //                     }
    //                 } else {
    //                     echo 'вказана група для даної таблиці відсутня'."<br>";
    //                     $mysqli->close();
    //                 }    
    //             } else {
    //                 echo 'не задано групу норм';
    //                 $mysqli->close();
    //             }
    //         } else {
    //             $mysqli->close();
    //             echo 'таблиця в базі відсутня';
    //         }
    //     } else {
    //         echo 'введіть коректні дані';
    //     }
    // }

    // db_conect();


?>