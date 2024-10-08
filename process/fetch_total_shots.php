<?php
// Include database connection
include 'conn.php';

// Prepare your SQL query
$query = "
WITH CombinedData AS (
   






SELECT fp.car_model, 'trd_wpa_0_13' AS process, SUM(fp.trd_wpa_0_13 * p2.first_month) AS value,SUM(fp.trd_wpa_0_13 * p2.second_month) AS second_value,SUM(fp.trd_wpa_0_13 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'trd_wpa_below_2_0_except_0_13' AS process, SUM(fp.trd_wpa_below_2_0_except_0_13 * p2.first_month) AS value,SUM(fp.trd_wpa_below_2_0_except_0_13 * p2.second_month) AS second_value,SUM(fp.trd_wpa_below_2_0_except_0_13 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'trd_wpa_2_0_3_0' AS process, SUM(fp.trd_wpa_2_0_3_0 * p2.first_month) AS value,SUM(fp.trd_wpa_2_0_3_0 * p2.second_month) AS second_value,SUM(fp.trd_wpa_2_0_3_0 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'tr327' AS process, SUM(fp.tr327 * p2.first_month) AS value,SUM(fp.tr327 * p2.second_month) AS second_value,SUM(fp.tr327 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'tr328' AS process, SUM(fp.tr328 * p2.first_month) AS value,SUM(fp.tr328 * p2.second_month) AS second_value,SUM(fp.tr328 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'trd_aluminum_nwpa_2_0' AS process, SUM(fp.trd_aluminum_nwpa_2_0 * p2.first_month) AS value,SUM(fp.trd_aluminum_nwpa_2_0 * p2.second_month) AS second_value,SUM(fp.trd_aluminum_nwpa_2_0 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'trd_aluminum_nwpa_below_2_0' AS process, SUM(fp.trd_aluminum_nwpa_below_2_0 * p2.first_month) AS value,SUM(fp.trd_aluminum_nwpa_below_2_0 * p2.second_month) AS second_value,SUM(fp.trd_aluminum_nwpa_below_2_0 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'trd_aluminum_wpa_2_0' AS process, SUM(fp.trd_aluminum_wpa_2_0 * p2.first_month) AS value,SUM(fp.trd_aluminum_wpa_2_0 * p2.second_month) AS second_value,SUM(fp.trd_aluminum_wpa_2_0 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model
UNION ALL
SELECT fp.car_model, 'trd_aluminum_wpa_below_2_0' AS process, SUM(fp.trd_aluminum_wpa_below_2_0 * p2.first_month) AS value,SUM(fp.trd_aluminum_wpa_below_2_0 * p2.second_month) AS second_value,SUM(fp.trd_aluminum_wpa_below_2_0 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'aluminum_dimension_check_aluminum_terminal_inspection' AS process, SUM(fp.aluminum_dimension_check_aluminum_terminal_inspection * p2.first_month) AS value,SUM(fp.aluminum_dimension_check_aluminum_terminal_inspection * p2.second_month) AS second_value,SUM(fp.aluminum_dimension_check_aluminum_terminal_inspection * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'aluminum_visual_inspection' AS process, SUM(fp.aluminum_visual_inspection * p2.first_month) AS value,SUM(fp.aluminum_visual_inspection * p2.second_month) AS second_value,SUM(fp.aluminum_visual_inspection * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'aluminum_coating_uv_ii' AS process, SUM(fp.aluminum_coating_uv_ii * p2.first_month) AS value,SUM(fp.aluminum_coating_uv_ii * p2.second_month) AS second_value,SUM(fp.aluminum_coating_uv_ii * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'aluminum_image_inspection' AS process, SUM(fp.aluminum_image_inspection * p2.first_month) AS value,SUM(fp.aluminum_image_inspection * p2.second_month) AS second_value,SUM(fp.aluminum_image_inspection * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'aluminum_uv_iii' AS process, SUM(fp.aluminum_uv_iii * p2.first_month) AS value,SUM(fp.aluminum_uv_iii * p2.second_month) AS second_value,SUM(fp.aluminum_uv_iii * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'trd_alpha_aluminum_nwpa' AS process, SUM(fp.trd_alpha_aluminum_nwpa * p2.first_month) AS value,SUM(fp.trd_alpha_aluminum_nwpa * p2.second_month) AS second_value,SUM(fp.trd_alpha_aluminum_nwpa * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'trd_alpha_aluminum_wpa' AS process, SUM(fp.trd_alpha_aluminum_wpa * p2.first_month) AS value,SUM(fp.trd_alpha_aluminum_wpa * p2.second_month) AS second_value,SUM(fp.trd_alpha_aluminum_wpa * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'aluminum_visual_inspection_for_alpha' AS process, SUM(fp.aluminum_visual_inspection_for_alpha * p2.first_month) AS value,SUM(fp.aluminum_visual_inspection_for_alpha * p2.second_month) AS second_value,SUM(fp.aluminum_visual_inspection_for_alpha * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'enlarged_terminal_check_for_alpha' AS process, SUM(fp.enlarged_terminal_check_for_alpha * p2.first_month) AS value,SUM(fp.enlarged_terminal_check_for_alpha * p2.second_month) AS second_value,SUM(fp.enlarged_terminal_check_for_alpha * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'air_water_leak_test' AS process, SUM(fp.air_water_leak_test * p2.first_month) AS value,SUM(fp.air_water_leak_test * p2.second_month) AS second_value,SUM(fp.air_water_leak_test * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'sam_sub_no_airbag' AS process, SUM(fp.sam_sub_no_airbag * p2.first_month) AS value,SUM(fp.sam_sub_no_airbag * p2.second_month) AS second_value,SUM(fp.sam_sub_no_airbag * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'sam_sub_no_normal' AS process, SUM(fp.sam_sub_no_normal * p2.first_month) AS value,SUM(fp.sam_sub_no_normal * p2.second_month) AS second_value,SUM(fp.sam_sub_no_normal * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'jam_auto_crimping_and_twisting' AS process, SUM(fp.jam_auto_crimping_and_twisting * p2.first_month) AS value,SUM(fp.jam_auto_crimping_and_twisting * p2.second_month) AS second_value,SUM(fp.jam_auto_crimping_and_twisting * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'trd_alpha_aluminum_5_0_above' AS process, SUM(fp.trd_alpha_aluminum_5_0_above * p2.first_month) AS value,SUM(fp.trd_alpha_aluminum_5_0_above * p2.second_month) AS second_value,SUM(fp.trd_alpha_aluminum_5_0_above * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'point_marking_nsc' AS process, SUM(fp.point_marking_nsc * p2.first_month) AS value,SUM(fp.point_marking_nsc * p2.second_month) AS second_value,SUM(fp.point_marking_nsc * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'point_marking_sam' AS process, SUM(fp.point_marking_sam * p2.first_month) AS value,SUM(fp.point_marking_sam * p2.second_month) AS second_value,SUM(fp.point_marking_sam * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'enlarged_terminal_check_aluminum' AS process, SUM(fp.enlarged_terminal_check_aluminum * p2.first_month) AS value,SUM(fp.enlarged_terminal_check_aluminum * p2.second_month) AS second_value,SUM(fp.enlarged_terminal_check_aluminum * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model
UNION ALL





	SELECT fp.car_model, 'nsc_1' AS process, SUM(fp.nsc_1 * p2.first_month) AS value,SUM(fp.nsc_1 * p2.second_month) AS second_value,SUM(fp.nsc_1 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'nsc_2' AS process, SUM(fp.nsc_2 * p2.first_month) AS value,SUM(fp.nsc_2 * p2.second_month) AS second_value,SUM(fp.nsc_2 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'nsc_3' AS process, SUM(fp.nsc_3 * p2.first_month) AS value,SUM(fp.nsc_3 * p2.second_month) AS second_value,SUM(fp.nsc_3 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'nsc_4' AS process, SUM(fp.nsc_4 * p2.first_month) AS value,SUM(fp.nsc_4 * p2.second_month) AS second_value,SUM(fp.nsc_4 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'nsc_5' AS process, SUM(fp.nsc_5 * p2.first_month) AS value,SUM(fp.nsc_5 * p2.second_month) AS second_value,SUM(fp.nsc_5 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'nsc_6' AS process, SUM(fp.nsc_6 * p2.first_month) AS value,SUM(fp.nsc_6 * p2.second_month) AS second_value,SUM(fp.nsc_6 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'nsc_7' AS process, SUM(fp.nsc_7 * p2.first_month) AS value,SUM(fp.nsc_7 * p2.second_month) AS second_value,SUM(fp.nsc_7 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'nsc_8' AS process, SUM(fp.nsc_8 * p2.first_month) AS value,SUM(fp.nsc_8 * p2.second_month) AS second_value,SUM(fp.nsc_8 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'nsc_9' AS process, SUM(fp.nsc_9 * p2.first_month) AS value,SUM(fp.nsc_9 * p2.second_month) AS second_value,SUM(fp.nsc_9 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model

UNION ALL

SELECT fp.car_model, 'nsc_10' AS process, SUM(fp.nsc_10 * p2.first_month) AS value,SUM(fp.nsc_10 * p2.second_month) AS second_value,SUM(fp.nsc_10 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[first_process] fp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON fp.base_product = p2.base_product
GROUP BY fp.car_model




UNION ALL



	SELECT up.car_model, 'joint_crimping_20tons_ps_115_2_3l_2' AS process, SUM(up.joint_crimping_20tons_ps_115_2_3l_2 * p2.first_month) AS value,SUM(up.joint_crimping_20tons_ps_115_2_3l_2 * p2.second_month) AS second_value,SUM(up.joint_crimping_20tons_ps_115_2_3l_2 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'ultrasonic_welding' AS process, SUM(up.ultrasonic_welding * p2.first_month) AS value,SUM(up.ultrasonic_welding * p2.second_month) AS second_value,SUM(up.ultrasonic_welding * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'servo_press_crimping' AS process, SUM(up.servo_press_crimping * p2.first_month) AS value,SUM(up.servo_press_crimping * p2.second_month) AS second_value,SUM(up.servo_press_crimping * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'low_viscosity' AS process, SUM(up.low_viscosity * p2.first_month) AS value,SUM(up.low_viscosity * p2.second_month) AS second_value,SUM(up.low_viscosity * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'air_water_leak_test2' AS process, SUM(up.air_water_leak_test2 * p2.first_month) AS value,SUM(up.air_water_leak_test2 * p2.second_month) AS second_value,SUM(up.air_water_leak_test2 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'heatshrink_low_viscosity' AS process, SUM(up.heatshrink_low_viscosity * p2.first_month) AS value,SUM(up.heatshrink_low_viscosity * p2.second_month) AS second_value,SUM(up.heatshrink_low_viscosity * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'stmac_shieldwire_j12' AS process, SUM(up.stmac_shieldwire_j12 * p2.first_month) AS value,SUM(up.stmac_shieldwire_j12 * p2.second_month) AS second_value,SUM(up.stmac_shieldwire_j12 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'hirose_sheath_stripping_927r' AS process, SUM(up.hirose_sheath_stripping_927r * p2.first_month) AS value,SUM(up.hirose_sheath_stripping_927r * p2.second_month) AS second_value,SUM(up.hirose_sheath_stripping_927r * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'hirose_unistrip' AS process, SUM(up.hirose_unistrip * p2.first_month) AS value,SUM(up.hirose_unistrip * p2.second_month) AS second_value,SUM(up.hirose_unistrip * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'hirose_acetate_taping' AS process, SUM(up.hirose_acetate_taping * p2.first_month) AS value,SUM(up.hirose_acetate_taping * p2.second_month) AS second_value,SUM(up.hirose_acetate_taping * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'hirose_manual_crimping_2_tons' AS process, SUM(up.hirose_manual_crimping_2_tons * p2.first_month) AS value,SUM(up.hirose_manual_crimping_2_tons * p2.second_month) AS second_value,SUM(up.hirose_manual_crimping_2_tons * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'hirose_copper_taping' AS process, SUM(up.hirose_copper_taping * p2.first_month) AS value,SUM(up.hirose_copper_taping * p2.second_month) AS second_value,SUM(up.hirose_copper_taping * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'hirose_hgt17ap_crimping' AS process, SUM(up.hirose_hgt17ap_crimping * p2.first_month) AS value,SUM(up.hirose_hgt17ap_crimping * p2.second_month) AS second_value,SUM(up.hirose_hgt17ap_crimping * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'stmac_aluminum' AS process, SUM(up.stmac_aluminum * p2.first_month) AS value,SUM(up.stmac_aluminum * p2.second_month) AS second_value,SUM(up.stmac_aluminum * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'manual_crimping_20tons' AS process, SUM(up.manual_crimping_20tons * p2.first_month) AS value,SUM(up.manual_crimping_20tons * p2.second_month) AS second_value,SUM(up.manual_crimping_20tons * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'dip_soldering_battery' AS process, SUM(up.dip_soldering_battery * p2.first_month) AS value,SUM(up.dip_soldering_battery * p2.second_month) AS second_value,SUM(up.dip_soldering_battery * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'ultrasonic_dip_soldering_aluminum' AS process, SUM(up.ultrasonic_dip_soldering_aluminum * p2.first_month) AS value,SUM(up.ultrasonic_dip_soldering_aluminum * p2.second_month) AS second_value,SUM(up.ultrasonic_dip_soldering_aluminum * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'la_molding' AS process, SUM(up.la_molding * p2.first_month) AS value,SUM(up.la_molding * p2.second_month) AS second_value,SUM(up.la_molding * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'pressure_welding_sun_visor' AS process, SUM(up.pressure_welding_sun_visor * p2.first_month) AS value,SUM(up.pressure_welding_sun_visor * p2.second_month) AS second_value,SUM(up.pressure_welding_sun_visor * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'pressure_welding_dome_lamp' AS process, SUM(up.pressure_welding_dome_lamp * p2.first_month) AS value,SUM(up.pressure_welding_dome_lamp * p2.second_month) AS second_value,SUM(up.pressure_welding_dome_lamp * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'casting_c377a' AS process, SUM(up.casting_c377a * p2.first_month) AS value,SUM(up.casting_c377a * p2.second_month) AS second_value,SUM(up.casting_c377a * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'coaxstrip_6580' AS process, SUM(up.coaxstrip_6580 * p2.first_month) AS value,SUM(up.coaxstrip_6580 * p2.second_month) AS second_value,SUM(up.coaxstrip_6580 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'manual_crimping_2t_ferrule' AS process, SUM(up.manual_crimping_2t_ferrule * p2.first_month) AS value,SUM(up.manual_crimping_2t_ferrule * p2.second_month) AS second_value,SUM(up.manual_crimping_2t_ferrule * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'ferrule_auto_crimping' AS process, SUM(up.ferrule_auto_crimping * p2.first_month) AS value,SUM(up.ferrule_auto_crimping * p2.second_month) AS second_value,SUM(up.ferrule_auto_crimping * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'enlarge_terminal_inspection' AS process, SUM(up.enlarge_terminal_inspection * p2.first_month) AS value,SUM(up.enlarge_terminal_inspection * p2.second_month) AS second_value,SUM(up.enlarge_terminal_inspection * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'waterproof_pad_press' AS process, SUM(up.waterproof_pad_press * p2.first_month) AS value,SUM(up.waterproof_pad_press * p2.second_month) AS second_value,SUM(up.waterproof_pad_press * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'parts_insertion' AS process, SUM(up.parts_insertion * p2.first_month) AS value,SUM(up.parts_insertion * p2.second_month) AS second_value,SUM(up.parts_insertion * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'braided_wire_folding' AS process, SUM(up.braided_wire_folding * p2.first_month) AS value,SUM(up.braided_wire_folding * p2.second_month) AS second_value,SUM(up.braided_wire_folding * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'outside_ferrule_insertion' AS process, SUM(up.outside_ferrule_insertion * p2.first_month) AS value,SUM(up.outside_ferrule_insertion * p2.second_month) AS second_value,SUM(up.outside_ferrule_insertion * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'joint_crimping_2t' AS process, SUM(up.joint_crimping_2t * p2.first_month) AS value,SUM(up.joint_crimping_2t * p2.second_month) AS second_value,SUM(up.joint_crimping_2t * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'welding_at_head' AS process, SUM(up.welding_at_head * p2.first_month) AS value,SUM(up.welding_at_head * p2.second_month) AS second_value,SUM(up.welding_at_head * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'welding_taping' AS process, SUM(up.welding_taping * p2.first_month) AS value,SUM(up.welding_taping * p2.second_month) AS second_value,SUM(up.welding_taping * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'uv_iii_1' AS process, SUM(up.uv_iii_1 * p2.first_month) AS value,SUM(up.uv_iii_1 * p2.second_month) AS second_value,SUM(up.uv_iii_1 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'uv_iii_2' AS process, SUM(up.uv_iii_2 * p2.first_month) AS value,SUM(up.uv_iii_2 * p2.second_month) AS second_value,SUM(up.uv_iii_2 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'uv_iii_4' AS process, SUM(up.uv_iii_4 * p2.first_month) AS value,SUM(up.uv_iii_4 * p2.second_month) AS second_value,SUM(up.uv_iii_4 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'uv_iii_5' AS process, SUM(up.uv_iii_5 * p2.first_month) AS value,SUM(up.uv_iii_5 * p2.second_month) AS second_value,SUM(up.uv_iii_5 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'uv_iii_7' AS process, SUM(up.uv_iii_7 * p2.first_month) AS value,SUM(up.uv_iii_7 * p2.second_month) AS second_value,SUM(up.uv_iii_7 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'uv_iii_8' AS process, SUM(up.uv_iii_8 * p2.first_month) AS value,SUM(up.uv_iii_8 * p2.second_month) AS second_value,SUM(up.uv_iii_8 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'drainwire_tip' AS process, SUM(up.drainwire_tip * p2.first_month) AS value,SUM(up.drainwire_tip * p2.second_month) AS second_value,SUM(up.drainwire_tip * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'arc_welding' AS process, SUM(up.arc_welding * p2.first_month) AS value,SUM(up.arc_welding * p2.second_month) AS second_value,SUM(up.arc_welding * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'c373a_yamaha' AS process, SUM(up.c373a_yamaha * p2.first_month) AS value,SUM(up.c373a_yamaha * p2.second_month) AS second_value,SUM(up.c373a_yamaha * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'cocripper' AS process, SUM(up.cocripper * p2.first_month) AS value,SUM(up.cocripper * p2.second_month) AS second_value,SUM(up.cocripper * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model
UNION ALL

SELECT up.car_model, 'quickstripping' AS process, SUM(up.quickstripping * p2.first_month) AS value,SUM(up.quickstripping * p2.second_month) AS second_value,SUM(up.quickstripping * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[unique_process] up
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON up.base_product = p2.base_product
GROUP BY up.car_model

UNION ALL
SELECT np.car_model, 'airbag_housing' AS process, SUM(np.airbag_housing * p2.first_month) AS value,SUM(np.airbag_housing * p2.second_month) AS second_value,SUM(np.airbag_housing * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[non_machine_process] np
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON np.base_product = p2.base_product
GROUP BY np.car_model

UNION ALL

SELECT np.car_model, 'cap_insertion' AS process, SUM(np.cap_insertion * p2.first_month) AS value,SUM(np.cap_insertion * p2.second_month) AS second_value,SUM(np.cap_insertion * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[non_machine_process] np
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON np.base_product = p2.base_product
GROUP BY np.car_model

UNION ALL

SELECT np.car_model, 'shieldwire_taping' AS process, SUM(np.shieldwire_taping * p2.first_month) AS value,SUM(np.shieldwire_taping * p2.second_month) AS second_value,SUM(np.shieldwire_taping * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[non_machine_process] np
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON np.base_product = p2.base_product
GROUP BY np.car_model

UNION ALL

SELECT np.car_model, 'gomusen_insertion' AS process, SUM(np.gomusen_insertion * p2.first_month) AS value,SUM(np.gomusen_insertion * p2.second_month) AS second_value,SUM(np.gomusen_insertion * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[non_machine_process] np
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON np.base_product = p2.base_product
GROUP BY np.car_model

UNION ALL

SELECT np.car_model, 'point_marking' AS process, SUM(np.point_marking * p2.first_month) AS value,SUM(np.point_marking * p2.second_month) AS second_value,SUM(np.point_marking * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[non_machine_process] np
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON np.base_product = p2.base_product
GROUP BY np.car_model

UNION ALL

SELECT np.car_model, 'looping' AS process, SUM(np.looping * p2.first_month) AS value,SUM(np.looping * p2.second_month) AS second_value,SUM(np.looping * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[non_machine_process] np
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON np.base_product = p2.base_product
GROUP BY np.car_model

UNION ALL

SELECT np.car_model, 'shikakari_handler' AS process, SUM(np.shikakari_handler * p2.first_month) AS value,SUM(np.shikakari_handler * p2.second_month) AS second_value,SUM(np.shikakari_handler * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[non_machine_process] np
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON np.base_product = p2.base_product
GROUP BY np.car_model

UNION ALL

SELECT np.car_model, 'black_taping' AS process, SUM(np.black_taping * p2.first_month) AS value,SUM(np.black_taping * p2.second_month) AS second_value,SUM(np.black_taping * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[non_machine_process] np
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON np.base_product = p2.base_product
GROUP BY np.car_model

UNION ALL

SELECT np.car_model, 'components_insertion' AS process, SUM(np.components_insertion * p2.first_month) AS value,SUM(np.components_insertion * p2.second_month) AS second_value,SUM(np.components_insertion * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[non_machine_process] np
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON np.base_product = p2.base_product
GROUP BY np.car_model



UNION ALL


    SELECT sp.car_model, 'joint_crimping_2tons_ps_800_s_2' AS process, SUM(sp.joint_crimping_2tons_ps_800_s_2 * p2.first_month) AS value,SUM(sp.joint_crimping_2tons_ps_800_s_2 * p2.second_month) AS second_value,SUM(sp.joint_crimping_2tons_ps_800_s_2 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'joint_crimping_2tons_ps_200_m_2' AS process, SUM(sp.joint_crimping_2tons_ps_200_m_2 * p2.first_month) AS value,SUM(sp.joint_crimping_2tons_ps_200_m_2 * p2.second_month) AS second_value,SUM(sp.joint_crimping_2tons_ps_200_m_2 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'joint_crimping_2tons_ps_017_ss_2' AS process, SUM(sp.joint_crimping_2tons_ps_017_ss_2 * p2.first_month) AS value,SUM(sp.joint_crimping_2tons_ps_017_ss_2 * p2.second_month) AS second_value,SUM(sp.joint_crimping_2tons_ps_017_ss_2 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'joint_crimping_2tons_ps_126_sst2' AS process, SUM(sp.joint_crimping_2tons_ps_126_sst2 * p2.first_month) AS value,SUM(sp.joint_crimping_2tons_ps_126_sst2 * p2.second_month) AS second_value,SUM(sp.joint_crimping_2tons_ps_126_sst2 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'joint_crimping_4tons_ps_700_l_2' AS process, SUM(sp.joint_crimping_4tons_ps_700_l_2 * p2.first_month) AS value,SUM(sp.joint_crimping_4tons_ps_700_l_2 * p2.second_month) AS second_value,SUM(sp.joint_crimping_4tons_ps_700_l_2 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'joint_crimping_5tons_ps_150_ll' AS process, SUM(sp.joint_crimping_5tons_ps_150_ll * p2.first_month) AS value,SUM(sp.joint_crimping_5tons_ps_150_ll * p2.second_month) AS second_value,SUM(sp.joint_crimping_5tons_ps_150_ll * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'manual_crimping_shieldwire_2t' AS process, SUM(sp.manual_crimping_shieldwire_2t * p2.first_month) AS value,SUM(sp.manual_crimping_shieldwire_2t * p2.second_month) AS second_value,SUM(sp.manual_crimping_shieldwire_2t * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'manual_crimping_shieldwire_4t' AS process, SUM(sp.manual_crimping_shieldwire_4t * p2.first_month) AS value,SUM(sp.manual_crimping_shieldwire_4t * p2.second_month) AS second_value,SUM(sp.manual_crimping_shieldwire_4t * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'joint_crimping_2tons_ps_800_s_2_sw' AS process, SUM(sp.joint_crimping_2tons_ps_800_s_2_sw * p2.first_month) AS value,SUM(sp.joint_crimping_2tons_ps_800_s_2_sw * p2.second_month) AS second_value,SUM(sp.joint_crimping_2tons_ps_800_s_2_sw * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'joint_crimping_2tons_ps_126_sst2_sw' AS process, SUM(sp.joint_crimping_2tons_ps_126_sst2_sw * p2.first_month) AS value,SUM(sp.joint_crimping_2tons_ps_126_sst2_sw * p2.second_month) AS second_value,SUM(sp.joint_crimping_2tons_ps_126_sst2_sw * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'joint_crimping_2tons_ps_017_ss_2_sw' AS process, SUM(sp.joint_crimping_2tons_ps_017_ss_2_sw * p2.first_month) AS value,SUM(sp.joint_crimping_2tons_ps_017_ss_2_sw * p2.second_month) AS second_value,SUM(sp.joint_crimping_2tons_ps_017_ss_2_sw * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'twisting_primary_normal_wires_l_less_than_1500mm' AS process, SUM(sp.twisting_primary_normal_wires_l_less_than_1500mm * p2.first_month) AS value,SUM(sp.twisting_primary_normal_wires_l_less_than_1500mm * p2.second_month) AS second_value,SUM(sp.twisting_primary_normal_wires_l_less_than_1500mm * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL
SELECT sp.car_model, 'twisting_secondary_normal_wires_l_less_than_3000mm' AS process, SUM(sp.twisting_secondary_normal_wires_l_less_than_3000mm * p2.first_month) AS value,SUM(sp.twisting_secondary_normal_wires_l_less_than_3000mm * p2.second_month) AS second_value,SUM(sp.twisting_secondary_normal_wires_l_less_than_3000mm * p2.third_month) AS third_value


FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'twisting_secondary_normal_wires_l_less_than_4500mm' AS process, SUM(sp.twisting_secondary_normal_wires_l_less_than_4500mm * p2.first_month) AS value,SUM(sp.twisting_secondary_normal_wires_l_less_than_4500mm * p2.second_month) AS second_value,SUM(sp.twisting_secondary_normal_wires_l_less_than_4500mm * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'twisting_secondary_normal_wires_l_less_than_6000mm' AS process, SUM(sp.twisting_secondary_normal_wires_l_less_than_6000mm * p2.first_month) AS value,SUM(sp.twisting_secondary_normal_wires_l_less_than_6000mm * p2.second_month) AS second_value,SUM(sp.twisting_secondary_normal_wires_l_less_than_6000mm * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'twisting_secondary_normal_wires_l_less_than_7500mm' AS process, SUM(sp.twisting_secondary_normal_wires_l_less_than_7500mm * p2.first_month) AS value,SUM(sp.twisting_secondary_normal_wires_l_less_than_7500mm * p2.second_month) AS second_value,SUM(sp.twisting_secondary_normal_wires_l_less_than_7500mm * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'twisting_secondary_normal_wires_l_less_than_9000mm' AS process, SUM(sp.twisting_secondary_normal_wires_l_less_than_9000mm * p2.first_month) AS value,SUM(sp.twisting_secondary_normal_wires_l_less_than_9000mm * p2.second_month) AS second_value,SUM(sp.twisting_secondary_normal_wires_l_less_than_9000mm * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'twisting_primary_aluminum_wires_l_less_than_1500mm' AS process, SUM(sp.twisting_primary_aluminum_wires_l_less_than_1500mm * p2.first_month) AS value,SUM(sp.twisting_primary_aluminum_wires_l_less_than_1500mm * p2.second_month) AS second_value,SUM(sp.twisting_primary_aluminum_wires_l_less_than_1500mm * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'twisting_primary_aluminum_wires_l_less_than_3000mm' AS process, SUM(sp.twisting_primary_aluminum_wires_l_less_than_3000mm * p2.first_month) AS value,SUM(sp.twisting_primary_aluminum_wires_l_less_than_3000mm * p2.second_month) AS second_value,SUM(sp.twisting_primary_aluminum_wires_l_less_than_3000mm * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'twisting_primary_aluminum_wires_l_less_than_4500mm' AS process, SUM(sp.twisting_primary_aluminum_wires_l_less_than_4500mm * p2.first_month) AS value,SUM(sp.twisting_primary_aluminum_wires_l_less_than_4500mm * p2.second_month) AS second_value,SUM(sp.twisting_primary_aluminum_wires_l_less_than_4500mm * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'twisting_primary_aluminum_wires_l_less_than_6000mm' AS process, SUM(sp.twisting_primary_aluminum_wires_l_less_than_6000mm * p2.first_month) AS value,SUM(sp.twisting_primary_aluminum_wires_l_less_than_6000mm * p2.second_month) AS second_value,SUM(sp.twisting_primary_aluminum_wires_l_less_than_6000mm * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'twisting_secondary_aluminum_wires_l_less_than_1500mm' AS process, SUM(sp.twisting_secondary_aluminum_wires_l_less_than_1500mm * p2.first_month) AS value,SUM(sp.twisting_secondary_aluminum_wires_l_less_than_1500mm * p2.second_month) AS second_value,SUM(sp.twisting_secondary_aluminum_wires_l_less_than_1500mm * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'twisting_secondary_aluminum_wires_l_less_than_3000mm' AS process, SUM(sp.twisting_secondary_aluminum_wires_l_less_than_3000mm * p2.first_month) AS value,SUM(sp.twisting_secondary_aluminum_wires_l_less_than_3000mm * p2.second_month) AS second_value,SUM(sp.twisting_secondary_aluminum_wires_l_less_than_3000mm * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'twisting_secondary_aluminum_wires_l_less_than_4500mm' AS process, SUM(sp.twisting_secondary_aluminum_wires_l_less_than_4500mm * p2.first_month) AS value,SUM(sp.twisting_secondary_aluminum_wires_l_less_than_4500mm * p2.second_month) AS second_value,SUM(sp.twisting_secondary_aluminum_wires_l_less_than_4500mm * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'twisting_secondary_aluminum_wires_l_less_than_6000mm' AS process, SUM(sp.twisting_secondary_aluminum_wires_l_less_than_6000mm * p2.first_month) AS value,SUM(sp.twisting_secondary_aluminum_wires_l_less_than_6000mm * p2.second_month) AS second_value,SUM(sp.twisting_secondary_aluminum_wires_l_less_than_6000mm * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'twisting_secondary_aluminum_wires_l_less_than_7500mm' AS process, SUM(sp.twisting_secondary_aluminum_wires_l_less_than_7500mm * p2.first_month) AS value,SUM(sp.twisting_secondary_aluminum_wires_l_less_than_7500mm * p2.second_month) AS second_value,SUM(sp.twisting_secondary_aluminum_wires_l_less_than_7500mm * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'twisting_secondary_aluminum_wires_l_less_than_9000mm' AS process, SUM(sp.twisting_secondary_aluminum_wires_l_less_than_9000mm * p2.first_month) AS value,SUM(sp.twisting_secondary_aluminum_wires_l_less_than_9000mm * p2.second_month) AS second_value,SUM(sp.twisting_secondary_aluminum_wires_l_less_than_9000mm * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'manual_crimping_2tons_normal_single_crimp' AS process, SUM(sp.manual_crimping_2tons_normal_single_crimp * p2.first_month) AS value,SUM(sp.manual_crimping_2tons_normal_single_crimp * p2.second_month) AS second_value,SUM(sp.manual_crimping_2tons_normal_single_crimp * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'manual_crimping_2tons_normal_double_crimp' AS process, SUM(sp.manual_crimping_2tons_normal_double_crimp * p2.first_month) AS value,SUM(sp.manual_crimping_2tons_normal_double_crimp * p2.second_month) AS second_value,SUM(sp.manual_crimping_2tons_normal_double_crimp * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL

SELECT sp.car_model, 'manual_crimping_2tons_double_crimp_twisted' AS process, SUM(sp.manual_crimping_2tons_double_crimp_twisted * p2.first_month) AS value,SUM(sp.manual_crimping_2tons_double_crimp_twisted * p2.second_month) AS second_value,SUM(sp.manual_crimping_2tons_double_crimp_twisted * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL
SELECT sp.car_model, 'manual_crimping_2tons_la_terminal' AS process, 
       SUM(sp.manual_crimping_2tons_la_terminal * p2.first_month) AS value,SUM(sp.manual_crimping_2tons_la_terminal * p2.second_month) AS second_value,SUM(sp.manual_crimping_2tons_la_terminal * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL

SELECT sp.car_model, 'manual_crimping_2tons_double_crimp_la_terminal' AS process, 
       SUM(sp.manual_crimping_2tons_double_crimp_la_terminal * p2.first_month) AS value,SUM(sp.manual_crimping_2tons_double_crimp_la_terminal * p2.second_month) AS second_value,SUM(sp.manual_crimping_2tons_double_crimp_la_terminal * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL

SELECT sp.car_model, 'manual_crimping_2tons_w_gomusen' AS process, 
       SUM(sp.manual_crimping_2tons_w_gomusen * p2.first_month) AS value,SUM(sp.manual_crimping_2tons_w_gomusen * p2.second_month) AS second_value,SUM(sp.manual_crimping_2tons_w_gomusen * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL

SELECT sp.car_model, 'manual_crimping_4tons_double_crimp_twisted' AS process, 
       SUM(sp.manual_crimping_4tons_double_crimp_twisted * p2.first_month) AS value,SUM(sp.manual_crimping_4tons_double_crimp_twisted * p2.second_month) AS second_value,SUM(sp.manual_crimping_4tons_double_crimp_twisted * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL

SELECT sp.car_model, 'manual_crimping_4tons_normal_single_crimp' AS process, 
       SUM(sp.manual_crimping_4tons_normal_single_crimp * p2.first_month) AS value,SUM(sp.manual_crimping_4tons_normal_single_crimp * p2.second_month) AS second_value,SUM(sp.manual_crimping_4tons_normal_single_crimp * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model
UNION ALL
SELECT sp.car_model, 'manual_crimping_4tons_normal_double_crimp' AS process, 
       SUM(sp.manual_crimping_4tons_normal_double_crimp * p2.first_month) AS value,SUM(sp.manual_crimping_4tons_normal_double_crimp * p2.second_month) AS second_value,SUM(sp.manual_crimping_4tons_normal_double_crimp * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL

SELECT sp.car_model, 'manual_crimping_4tons_la_terminal' AS process, 
       SUM(sp.manual_crimping_4tons_la_terminal * p2.first_month) AS value,SUM(sp.manual_crimping_4tons_la_terminal * p2.second_month) AS second_value,SUM(sp.manual_crimping_4tons_la_terminal * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL

SELECT sp.car_model, 'manual_crimping_4tons_double_crimp_la_terminal' AS process, 
       SUM(sp.manual_crimping_4tons_double_crimp_la_terminal * p2.first_month) AS value,SUM(sp.manual_crimping_4tons_double_crimp_la_terminal * p2.second_month) AS second_value,SUM(sp.manual_crimping_4tons_double_crimp_la_terminal * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL

SELECT sp.car_model, 'manual_crimping_4tons_w_gomusen' AS process, 
       SUM(sp.manual_crimping_4tons_w_gomusen * p2.first_month) AS value,SUM(sp.manual_crimping_4tons_w_gomusen * p2.second_month) AS second_value,SUM(sp.manual_crimping_4tons_w_gomusen * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL

SELECT sp.car_model, 'manual_crimping_5tons' AS process, 
       SUM(sp.manual_crimping_5tons * p2.first_month) AS value,SUM(sp.manual_crimping_5tons * p2.second_month) AS second_value,SUM(sp.manual_crimping_5tons * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL

SELECT sp.car_model, 'intermediate_butt_welding_except_0_13_electrode_1' AS process, 
       SUM(sp.intermediate_butt_welding_except_0_13_electrode_1 * p2.first_month) AS value,SUM(sp.intermediate_butt_welding_except_0_13_electrode_1 * p2.second_month) AS second_value,SUM(sp.intermediate_butt_welding_except_0_13_electrode_1 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL

SELECT sp.car_model, 'intermediate_butt_welding_except_0_13_electrode_2' AS process, 
       SUM(sp.intermediate_butt_welding_except_0_13_electrode_2 * p2.first_month) AS value,SUM(sp.intermediate_butt_welding_except_0_13_electrode_2 * p2.second_month) AS second_value,SUM(sp.intermediate_butt_welding_except_0_13_electrode_2 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL

SELECT sp.car_model, 'intermediate_butt_welding_except_0_13_electrode_3' AS process, 
       SUM(sp.intermediate_butt_welding_except_0_13_electrode_3 * p2.first_month) AS value,SUM(sp.intermediate_butt_welding_except_0_13_electrode_3 * p2.second_month) AS second_value,SUM(sp.intermediate_butt_welding_except_0_13_electrode_3 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL

SELECT sp.car_model, 'intermediate_butt_welding_except_0_13_electrode_4' AS process, 
       SUM(sp.intermediate_butt_welding_except_0_13_electrode_4 * p2.first_month) AS value,SUM(sp.intermediate_butt_welding_except_0_13_electrode_4 * p2.second_month) AS second_value,SUM(sp.intermediate_butt_welding_except_0_13_electrode_4 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL

SELECT sp.car_model, 'intermediate_butt_welding_except_0_13_electrode_5' AS process, 
       SUM(sp.intermediate_butt_welding_except_0_13_electrode_5 * p2.first_month) AS value,SUM(sp.intermediate_butt_welding_except_0_13_electrode_5 * p2.second_month) AS second_value,SUM(sp.intermediate_butt_welding_except_0_13_electrode_5 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL

SELECT sp.car_model, 'welding_at_head_except_0_13_electrode_1' AS process, 
       SUM(sp.welding_at_head_except_0_13_electrode_1 * p2.first_month) AS value,SUM(sp.welding_at_head_except_0_13_electrode_1 * p2.second_month) AS second_value,SUM(sp.welding_at_head_except_0_13_electrode_1 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL

SELECT sp.car_model, 'welding_at_head_except_0_13_electrode_2' AS process, 
       SUM(sp.welding_at_head_except_0_13_electrode_2 * p2.first_month) AS value,SUM(sp.welding_at_head_except_0_13_electrode_2 * p2.second_month) AS second_value,SUM(sp.welding_at_head_except_0_13_electrode_2 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL

SELECT sp.car_model, 'welding_at_head_except_0_13_electrode_3' AS process, 
       SUM(sp.welding_at_head_except_0_13_electrode_3 * p2.first_month) AS value,SUM(sp.welding_at_head_except_0_13_electrode_3 * p2.second_month) AS second_value,SUM(sp.welding_at_head_except_0_13_electrode_3 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL

SELECT sp.car_model, 'welding_at_head_except_0_13_electrode_4' AS process, 
       SUM(sp.welding_at_head_except_0_13_electrode_4 * p2.first_month) AS value,SUM(sp.welding_at_head_except_0_13_electrode_4 * p2.second_month) AS second_value,SUM(sp.welding_at_head_except_0_13_electrode_4 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL

SELECT sp.car_model, 'welding_at_head_except_0_13_electrode_5' AS process, 
       SUM(sp.welding_at_head_except_0_13_electrode_5 * p2.first_month) AS value,SUM(sp.welding_at_head_except_0_13_electrode_5 * p2.second_month) AS second_value,SUM(sp.welding_at_head_except_0_13_electrode_5 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL

SELECT sp.car_model, 'intermediate_butt_welding_0_13_electrode_1' AS process, 
       SUM(sp.intermediate_butt_welding_0_13_electrode_1 * p2.first_month) AS value,SUM(sp.intermediate_butt_welding_0_13_electrode_1 * p2.second_month) AS second_value,SUM(sp.intermediate_butt_welding_0_13_electrode_1 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL

SELECT sp.car_model, 'welding_at_head_0_13_electrode_1' AS process, 
       SUM(sp.welding_at_head_0_13_electrode_1 * p2.first_month) AS value,SUM(sp.welding_at_head_0_13_electrode_1 * p2.second_month) AS second_value,SUM(sp.welding_at_head_0_13_electrode_1 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL

SELECT sp.car_model, 'intermediate_butt_welding_0_13_electrode_2' AS process, 
       SUM(sp.intermediate_butt_welding_0_13_electrode_2 * p2.first_month) AS value,SUM(sp.intermediate_butt_welding_0_13_electrode_2 * p2.second_month) AS second_value,SUM(sp.intermediate_butt_welding_0_13_electrode_2 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL

SELECT sp.car_model, 'welding_at_head_0_13_electrode_2' AS process, 
       SUM(sp.welding_at_head_0_13_electrode_2 * p2.first_month) AS value,SUM(sp.welding_at_head_0_13_electrode_2 * p2.second_month) AS second_value,SUM(sp.welding_at_head_0_13_electrode_2 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[secondary_process] sp
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON sp.base_product = p2.base_product
GROUP BY sp.car_model

UNION ALL
SELECT op.car_model, 'v_type_twisting' AS process, SUM(op.v_type_twisting * p2.first_month) AS value ,SUM(op.v_type_twisting * p2.second_month) AS second_value,SUM(op.v_type_twisting * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'manual_crimping_2tons_to_be_joint_on_sw' AS process, SUM(op.manual_crimping_2tons_to_be_joint_on_sw * p2.first_month) AS value,SUM(op.manual_crimping_2tons_to_be_joint_on_sw * p2.second_month) AS second_value,SUM(op.manual_crimping_2tons_to_be_joint_on_sw * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'airbag' AS process, SUM(op.airbag * p2.first_month) AS value,SUM(op.airbag * p2.second_month) AS second_value,SUM(op.airbag * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'a_b_sub_pc' AS process, SUM(op.a_b_sub_pc * p2.first_month) AS value,SUM(op.a_b_sub_pc * p2.second_month) AS second_value,SUM(op.a_b_sub_pc * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'intermediate_ripping_uas_manual_nf_f' AS process, SUM(op.intermediate_ripping_uas_manual_nf_f * p2.first_month) AS value,SUM(op.intermediate_ripping_uas_manual_nf_f * p2.second_month) AS second_value,SUM(op.intermediate_ripping_uas_manual_nf_f * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'manual_crimping_4tons_nf_f' AS process, SUM(op.manual_crimping_4tons_nf_f * p2.first_month) AS value,SUM(op.manual_crimping_4tons_nf_f * p2.second_month) AS second_value,SUM(op.manual_crimping_4tons_nf_f * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL
SELECT op.car_model, 'intermediate_ripping_uas_joint' AS process, SUM(op.intermediate_ripping_uas_joint * p2.first_month) AS value,SUM(op.intermediate_ripping_uas_joint * p2.second_month) AS second_value,SUM(op.intermediate_ripping_uas_joint * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'intermediate_stripping_kb10' AS process, SUM(op.intermediate_stripping_kb10 * p2.first_month) AS value,SUM(op.intermediate_stripping_kb10 * p2.second_month) AS second_value,SUM(op.intermediate_stripping_kb10 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22' AS process, SUM(op.manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22 * p2.first_month) AS value,SUM(op.manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22 * p2.second_month) AS second_value,SUM(op.manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'joint_taping_11mm_ps_150_ll_2' AS process, SUM(op.joint_taping_11mm_ps_150_ll_2 * p2.first_month) AS value,SUM(op.joint_taping_11mm_ps_150_ll_2 * p2.second_month) AS second_value,SUM(op.joint_taping_11mm_ps_150_ll_2 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'joint_taping_12mm_ps_700_l_2_ps_200_m_2' AS process, SUM(op.joint_taping_12mm_ps_700_l_2_ps_200_m_2 * p2.first_month) AS value,SUM(op.joint_taping_12mm_ps_700_l_2_ps_200_m_2 * p2.second_month) AS second_value,SUM(op.joint_taping_12mm_ps_700_l_2_ps_200_m_2 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2' AS process, SUM(op.joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2 * p2.first_month) AS value,SUM(op.joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2 * p2.second_month) AS second_value,SUM(op.joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'heat_shrink_joint_crimping' AS process, SUM(op.heat_shrink_joint_crimping * p2.first_month) AS value,SUM(op.heat_shrink_joint_crimping * p2.second_month) AS second_value,SUM(op.heat_shrink_joint_crimping * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'heat_shrink_la_terminal' AS process, SUM(op.heat_shrink_la_terminal * p2.first_month) AS value,SUM(op.heat_shrink_la_terminal * p2.second_month) AS second_value,SUM(op.heat_shrink_la_terminal * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model
UNION ALL
SELECT op.car_model, 'manual_crimping_2tons_nsc_weld' AS process, SUM(op.manual_crimping_2tons_nsc_weld * p2.first_month) AS value,SUM(op.manual_crimping_2tons_nsc_weld * p2.second_month) AS second_value,SUM(op.manual_crimping_2tons_nsc_weld * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'intermediate_stripping_kb10_nsc_weld' AS process, SUM(op.intermediate_stripping_kb10_nsc_weld * p2.first_month) AS value,SUM(op.intermediate_stripping_kb10_nsc_weld * p2.second_month) AS second_value,SUM(op.intermediate_stripping_kb10_nsc_weld * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'joint_crimping_2tons_ps_017_ss_2_nsc_weld' AS process, SUM(op.joint_crimping_2tons_ps_017_ss_2_nsc_weld * p2.first_month) AS value,SUM(op.joint_crimping_2tons_ps_017_ss_2_nsc_weld * p2.second_month) AS second_value,SUM(op.joint_crimping_2tons_ps_017_ss_2_nsc_weld * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld' AS process, SUM(op.joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld * p2.first_month) AS value,SUM(op.joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld * p2.second_month) AS second_value,SUM(op.joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'silicon_injection' AS process, SUM(op.silicon_injection * p2.first_month) AS value,SUM(op.silicon_injection * p2.second_month) AS second_value,SUM(op.silicon_injection * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'welding_taping_13mm' AS process, SUM(op.welding_taping_13mm * p2.first_month) AS value,SUM(op.welding_taping_13mm * p2.second_month) AS second_value,SUM(op.welding_taping_13mm * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'heat_shrink_welding' AS process, SUM(op.heat_shrink_welding * p2.first_month) AS value,SUM(op.heat_shrink_welding * p2.second_month) AS second_value,SUM(op.heat_shrink_welding * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'casting_c385_shieldwire' AS process, SUM(op.casting_c385_shieldwire * p2.first_month) AS value,SUM(op.casting_c385_shieldwire * p2.second_month) AS second_value,SUM(op.casting_c385_shieldwire * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model
UNION ALL
SELECT op.car_model, 'quick_stripping_927_auto' AS process, SUM(op.quick_stripping_927_auto * p2.first_month) AS value,SUM(op.quick_stripping_927_auto * p2.second_month) AS second_value,SUM(op.quick_stripping_927_auto * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'mira_quick_stripping' AS process, SUM(op.mira_quick_stripping * p2.first_month) AS value,SUM(op.mira_quick_stripping * p2.second_month) AS second_value,SUM(op.mira_quick_stripping * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'quick_stripping_311_manual' AS process, SUM(op.quick_stripping_311_manual * p2.first_month) AS value,SUM(op.quick_stripping_311_manual * p2.second_month) AS second_value,SUM(op.quick_stripping_311_manual * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'manual_heat_shrink_blower_sumitube' AS process, SUM(op.manual_heat_shrink_blower_sumitube * p2.first_month) AS value,SUM(op.manual_heat_shrink_blower_sumitube * p2.second_month) AS second_value,SUM(op.manual_heat_shrink_blower_sumitube * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'manual_taping_dispenser_sw' AS process, SUM(op.manual_taping_dispenser_sw * p2.first_month) AS value,SUM(op.manual_taping_dispenser_sw * p2.second_month) AS second_value,SUM(op.manual_taping_dispenser_sw * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'heat_shrink_joint_crimping_sw' AS process, SUM(op.heat_shrink_joint_crimping_sw * p2.first_month) AS value,SUM(op.heat_shrink_joint_crimping_sw * p2.second_month) AS second_value,SUM(op.heat_shrink_joint_crimping_sw * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'casting_c373' AS process, SUM(op.casting_c373 * p2.first_month) AS value,SUM(op.casting_c373 * p2.second_month) AS second_value,SUM(op.casting_c373 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'casting_c377' AS process, SUM(op.casting_c377 * p2.first_month) AS value,SUM(op.casting_c377 * p2.second_month) AS second_value,SUM(op.casting_c377 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'casting_c371' AS process, SUM(op.casting_c371 * p2.first_month) AS value,SUM(op.casting_c371 * p2.second_month) AS second_value,SUM(op.casting_c371 * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'manual_heat_shrink_blower_battery' AS process, SUM(op.manual_heat_shrink_blower_battery * p2.first_month) AS value,SUM(op.manual_heat_shrink_blower_battery * p2.second_month) AS second_value,SUM(op.manual_heat_shrink_blower_battery * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'casting_c373_normal' AS process, SUM(op.casting_c373_normal * p2.first_month) AS value,SUM(op.casting_c373_normal * p2.second_month) AS second_value,SUM(op.casting_c373_normal * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'casting_c371_normal' AS process, SUM(op.casting_c371_normal * p2.first_month) AS value,SUM(op.casting_c371_normal * p2.second_month) AS second_value,SUM(op.casting_c371_normal * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'manual_2tons_bending' AS process, SUM(op.manual_2tons_bending * p2.first_month) AS value,SUM(op.manual_2tons_bending * p2.second_month) AS second_value,SUM(op.manual_2tons_bending * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model
UNION ALL
SELECT op.car_model, 'manual_5tons_battery' AS process, SUM(op.manual_5tons_battery * p2.first_month) AS value,SUM(op.manual_5tons_battery * p2.second_month) AS second_value,SUM(op.manual_5tons_battery * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'al_looping' AS process, SUM(op.al_looping * p2.first_month) AS value,SUM(op.al_looping * p2.second_month) AS second_value,SUM(op.al_looping * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'soldering' AS process, SUM(op.soldering * p2.first_month) AS value,SUM(op.soldering * p2.second_month) AS second_value,SUM(op.soldering * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'waterproof_agent_injection' AS process, SUM(op.waterproof_agent_injection * p2.first_month) AS value,SUM(op.waterproof_agent_injection * p2.second_month) AS second_value,SUM(op.waterproof_agent_injection * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'thermosetting' AS process, SUM(op.thermosetting * p2.first_month) AS value,SUM(op.thermosetting * p2.second_month) AS second_value,SUM(op.thermosetting * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'completion' AS process, SUM(op.completion * p2.first_month) AS value,SUM(op.completion * p2.second_month) AS second_value,SUM(op.completion * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'picking_looping' AS process, SUM(op.picking_looping * p2.first_month) AS value,SUM(op.picking_looping * p2.second_month) AS second_value,SUM(op.picking_looping * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'welding_end' AS process, SUM(op.welding_end * p2.first_month) AS value,SUM(op.welding_end * p2.second_month) AS second_value,SUM(op.welding_end * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'intermediate_welding' AS process, SUM(op.intermediate_welding * p2.first_month) AS value,SUM(op.intermediate_welding * p2.second_month) AS second_value,SUM(op.intermediate_welding * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'sam_set_a_b' AS process, SUM(op.sam_set_a_b * p2.first_month) AS value,SUM(op.sam_set_a_b * p2.second_month) AS second_value,SUM(op.sam_set_a_b * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'sam_set_normal' AS process, SUM(op.sam_set_normal * p2.first_month) AS value,SUM(op.sam_set_normal * p2.second_month) AS second_value,SUM(op.sam_set_normal * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 

SELECT op.car_model, 'total_circuit' AS process, SUM(op.total_circuit * p2.first_month) AS value,SUM(op.total_circuit * p2.second_month) AS second_value,SUM(op.total_circuit * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model

UNION ALL 	

SELECT op.car_model, 'new_airbag' AS process, SUM(op.new_airbag * p2.first_month) AS value,SUM(op.new_airbag * p2.second_month) AS second_value,SUM(op.new_airbag * p2.third_month) AS third_value

FROM [live_mrcs_db].[dbo].[other_process] op
JOIN [live_mrcs_db].[dbo].[plan_2] p2 ON op.base_product = p2.base_product
GROUP BY op.car_model


)

SELECT car_model, process, value, second_value, third_value
FROM CombinedData
ORDER BY car_model

"; // Modify as necessary

// Execute the query
$result = sqlsrv_query($conn, $query);

$data = [];
if ($result) {
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        $data[] = $row;
    }
} else {
    die(print_r(sqlsrv_errors(), true));
}

// Encode data as JSON
echo json_encode($data);
?>
