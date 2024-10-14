<?php

include 'conn.php';


$query = "
WITH CombinedResults AS (
    SELECT 
        fp.[car_model],
        'trd_nwpa_0_13' AS process,
        SUM(fp.[trd_nwpa_0_13] * p.[first_month]) AS first_total_shots,
        SUM(fp.[trd_nwpa_0_13] * p.[second_month]) AS second_total_shots,
        SUM(fp.[trd_nwpa_0_13] * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]

    UNION ALL

    SELECT 
        fp.[car_model],
        'trd_nwpa_below_2_0_except_0_13' AS process,
        SUM(fp.[trd_nwpa_below_2_0_except_0_13] * p.[first_month]) AS first_total_shots,
        SUM(fp.[trd_nwpa_below_2_0_except_0_13] * p.[second_month]) AS second_total_shots,
        SUM(fp.[trd_nwpa_below_2_0_except_0_13] * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]

    UNION ALL

    SELECT 
        fp.[car_model],
        'trd_nwpa_2_0_3_0' AS process,
        SUM(fp.[trd_nwpa_2_0_3_0] * p.[first_month]) AS first_total_shots,
        SUM(fp.[trd_nwpa_2_0_3_0] * p.[second_month]) AS second_total_shots,
        SUM(fp.[trd_nwpa_2_0_3_0] * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]

    UNION ALL

    SELECT 
        fp.[car_model],
        'trd_wpa_0_13' AS process,
        SUM(fp.[trd_wpa_0_13] * p.[first_month]) AS first_total_shots,
        SUM(fp.[trd_wpa_0_13] * p.[second_month]) AS second_total_shots,
        SUM(fp.[trd_wpa_0_13] * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]

    UNION ALL

    SELECT 
        fp.[car_model],
        'trd_wpa_below_2_0_except_0_13' AS process,
        SUM(fp.[trd_wpa_below_2_0_except_0_13] * p.[first_month]) AS first_total_shots,
        SUM(fp.[trd_wpa_below_2_0_except_0_13] * p.[second_month]) AS second_total_shots,
        SUM(fp.[trd_wpa_below_2_0_except_0_13] * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]

    UNION ALL

    SELECT 
        fp.[car_model],
        'trd_wpa_2_0_3_0' AS process,
        SUM(fp.[trd_wpa_2_0_3_0] * p.[first_month]) AS first_total_shots,
        SUM(fp.[trd_wpa_2_0_3_0] * p.[second_month]) AS second_total_shots,
        SUM(fp.[trd_wpa_2_0_3_0] * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]

    UNION ALL

    SELECT 
        fp.[car_model],
        'tr327' AS process,
        SUM(fp.[tr327] * p.[first_month]) AS first_total_shots,
        SUM(fp.[tr327] * p.[second_month]) AS second_total_shots,
        SUM(fp.[tr327] * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
		UNION ALL
SELECT 
        fp.[car_model],
        'tr327' AS process,
        SUM(fp.tr327 * p.[first_month]) AS first_total_shots,
        SUM(fp.tr327 * p.[second_month]) AS second_total_shots,
        SUM(fp.tr327 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'tr328' AS process,
        SUM(fp.tr328 * p.[first_month]) AS first_total_shots,
        SUM(fp.tr328 * p.[second_month]) AS second_total_shots,
        SUM(fp.tr328 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'trd_aluminum_nwpa_2_0' AS process,
        SUM(fp.trd_aluminum_nwpa_2_0 * p.[first_month]) AS first_total_shots,
        SUM(fp.trd_aluminum_nwpa_2_0 * p.[second_month]) AS second_total_shots,
        SUM(fp.trd_aluminum_nwpa_2_0 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'trd_aluminum_nwpa_below_2_0' AS process,
        SUM(fp.trd_aluminum_nwpa_below_2_0 * p.[first_month]) AS first_total_shots,
        SUM(fp.trd_aluminum_nwpa_below_2_0 * p.[second_month]) AS second_total_shots,
        SUM(fp.trd_aluminum_nwpa_below_2_0 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'trd_aluminum_wpa_2_0' AS process,
        SUM(fp.trd_aluminum_wpa_2_0 * p.[first_month]) AS first_total_shots,
        SUM(fp.trd_aluminum_wpa_2_0 * p.[second_month]) AS second_total_shots,
        SUM(fp.trd_aluminum_wpa_2_0 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'trd_aluminum_wpa_below_2_0' AS process,
        SUM(fp.trd_aluminum_wpa_below_2_0 * p.[first_month]) AS first_total_shots,
        SUM(fp.trd_aluminum_wpa_below_2_0 * p.[second_month]) AS second_total_shots,
        SUM(fp.trd_aluminum_wpa_below_2_0 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'aluminum_dimension_check_aluminum_terminal_inspection' AS process,
        SUM(fp.aluminum_dimension_check_aluminum_terminal_inspection * p.[first_month]) AS first_total_shots,
        SUM(fp.aluminum_dimension_check_aluminum_terminal_inspection * p.[second_month]) AS second_total_shots,
        SUM(fp.aluminum_dimension_check_aluminum_terminal_inspection * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'aluminum_visual_inspection' AS process,
        SUM(fp.aluminum_visual_inspection * p.[first_month]) AS first_total_shots,
        SUM(fp.aluminum_visual_inspection * p.[second_month]) AS second_total_shots,
        SUM(fp.aluminum_visual_inspection * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'aluminum_coating_uv_ii' AS process,
        SUM(fp.aluminum_coating_uv_ii * p.[first_month]) AS first_total_shots,
        SUM(fp.aluminum_coating_uv_ii * p.[second_month]) AS second_total_shots,
        SUM(fp.aluminum_coating_uv_ii * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'aluminum_image_inspection' AS process,
        SUM(fp.aluminum_image_inspection * p.[first_month]) AS first_total_shots,
        SUM(fp.aluminum_image_inspection * p.[second_month]) AS second_total_shots,
        SUM(fp.aluminum_image_inspection * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'aluminum_uv_iii' AS process,
        SUM(fp.aluminum_uv_iii * p.[first_month]) AS first_total_shots,
        SUM(fp.aluminum_uv_iii * p.[second_month]) AS second_total_shots,
        SUM(fp.aluminum_uv_iii * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'trd_alpha_aluminum_nwpa' AS process,
        SUM(fp.trd_alpha_aluminum_nwpa * p.[first_month]) AS first_total_shots,
        SUM(fp.trd_alpha_aluminum_nwpa * p.[second_month]) AS second_total_shots,
        SUM(fp.trd_alpha_aluminum_nwpa * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'trd_alpha_aluminum_wpa' AS process,
        SUM(fp.trd_alpha_aluminum_wpa * p.[first_month]) AS first_total_shots,
        SUM(fp.trd_alpha_aluminum_wpa * p.[second_month]) AS second_total_shots,
        SUM(fp.trd_alpha_aluminum_wpa * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'aluminum_visual_inspection_for_alpha' AS process,
        SUM(fp.aluminum_visual_inspection_for_alpha * p.[first_month]) AS first_total_shots,
        SUM(fp.aluminum_visual_inspection_for_alpha * p.[second_month]) AS second_total_shots,
        SUM(fp.aluminum_visual_inspection_for_alpha * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'enlarged_terminal_check_for_alpha' AS process,
        SUM(fp.enlarged_terminal_check_for_alpha * p.[first_month]) AS first_total_shots,
        SUM(fp.enlarged_terminal_check_for_alpha * p.[second_month]) AS second_total_shots,
        SUM(fp.enlarged_terminal_check_for_alpha * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'air_water_leak_test' AS process,
        SUM(fp.air_water_leak_test * p.[first_month]) AS first_total_shots,
        SUM(fp.air_water_leak_test * p.[second_month]) AS second_total_shots,
        SUM(fp.air_water_leak_test * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'sam_sub_no_airbag' AS process,
        SUM(fp.sam_sub_no_airbag * p.[first_month]) AS first_total_shots,
        SUM(fp.sam_sub_no_airbag * p.[second_month]) AS second_total_shots,
        SUM(fp.sam_sub_no_airbag * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'sam_sub_no_normal' AS process,
        SUM(fp.sam_sub_no_normal * p.[first_month]) AS first_total_shots,
        SUM(fp.sam_sub_no_normal * p.[second_month]) AS second_total_shots,
        SUM(fp.sam_sub_no_normal * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'jam_auto_crimping_and_twisting' AS process,
        SUM(fp.jam_auto_crimping_and_twisting * p.[first_month]) AS first_total_shots,
        SUM(fp.jam_auto_crimping_and_twisting * p.[second_month]) AS second_total_shots,
        SUM(fp.jam_auto_crimping_and_twisting * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'trd_alpha_aluminum_5_0_above' AS process,
        SUM(fp.trd_alpha_aluminum_5_0_above * p.[first_month]) AS first_total_shots,
        SUM(fp.trd_alpha_aluminum_5_0_above * p.[second_month]) AS second_total_shots,
        SUM(fp.trd_alpha_aluminum_5_0_above * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'point_marking_nsc' AS process,
        SUM(fp.point_marking_nsc * p.[first_month]) AS first_total_shots,
        SUM(fp.point_marking_nsc * p.[second_month]) AS second_total_shots,
        SUM(fp.point_marking_nsc * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'point_marking_sam' AS process,
        SUM(fp.point_marking_sam * p.[first_month]) AS first_total_shots,
        SUM(fp.point_marking_sam * p.[second_month]) AS second_total_shots,
        SUM(fp.point_marking_sam * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'enlarged_terminal_check_aluminum' AS process,
        SUM(fp.enlarged_terminal_check_aluminum * p.[first_month]) AS first_total_shots,
        SUM(fp.enlarged_terminal_check_aluminum * p.[second_month]) AS second_total_shots,
        SUM(fp.enlarged_terminal_check_aluminum * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'nsc_1' AS process,
        SUM(fp.nsc_1 * p.[first_month]) AS first_total_shots,
        SUM(fp.nsc_1 * p.[second_month]) AS second_total_shots,
        SUM(fp.nsc_1 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'nsc_2' AS process,
        SUM(fp.nsc_2 * p.[first_month]) AS first_total_shots,
        SUM(fp.nsc_2 * p.[second_month]) AS second_total_shots,
        SUM(fp.nsc_2 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'nsc_3' AS process,
        SUM(fp.nsc_3 * p.[first_month]) AS first_total_shots,
        SUM(fp.nsc_3 * p.[second_month]) AS second_total_shots,
        SUM(fp.nsc_3 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'nsc_4' AS process,
        SUM(fp.nsc_4 * p.[first_month]) AS first_total_shots,
        SUM(fp.nsc_4 * p.[second_month]) AS second_total_shots,
        SUM(fp.nsc_4 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'nsc_5' AS process,
        SUM(fp.nsc_5 * p.[first_month]) AS first_total_shots,
        SUM(fp.nsc_5 * p.[second_month]) AS second_total_shots,
        SUM(fp.nsc_5 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'nsc_6' AS process,
        SUM(fp.nsc_6 * p.[first_month]) AS first_total_shots,
        SUM(fp.nsc_6 * p.[second_month]) AS second_total_shots,
        SUM(fp.nsc_6 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'nsc_7' AS process,
        SUM(fp.nsc_7 * p.[first_month]) AS first_total_shots,
        SUM(fp.nsc_7 * p.[second_month]) AS second_total_shots,
        SUM(fp.nsc_7 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'nsc_8' AS process,
        SUM(fp.nsc_8 * p.[first_month]) AS first_total_shots,
        SUM(fp.nsc_8 * p.[second_month]) AS second_total_shots,
        SUM(fp.nsc_8 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'nsc_9' AS process,
        SUM(fp.nsc_9 * p.[first_month]) AS first_total_shots,
        SUM(fp.nsc_9 * p.[second_month]) AS second_total_shots,
        SUM(fp.nsc_9 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        fp.[car_model],
        'nsc_10' AS process,
        SUM(fp.nsc_10 * p.[first_month]) AS first_total_shots,
        SUM(fp.nsc_10 * p.[second_month]) AS second_total_shots,
        SUM(fp.nsc_10 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[first_process] AS fp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON fp.[base_product] = p.[base_product]
    GROUP BY 
        fp.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'joint_crimping_20tons_ps_115_2_3l_2' AS process,
        SUM(up.joint_crimping_20tons_ps_115_2_3l_2 * p.[first_month]) AS first_total_shots,
        SUM(up.joint_crimping_20tons_ps_115_2_3l_2 * p.[second_month]) AS second_total_shots,
        SUM(up.joint_crimping_20tons_ps_115_2_3l_2 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'ultrasonic_welding' AS process,
        SUM(up.ultrasonic_welding * p.[first_month]) AS first_total_shots,
        SUM(up.ultrasonic_welding * p.[second_month]) AS second_total_shots,
        SUM(up.ultrasonic_welding * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'servo_press_crimping' AS process,
        SUM(up.servo_press_crimping * p.[first_month]) AS first_total_shots,
        SUM(up.servo_press_crimping * p.[second_month]) AS second_total_shots,
        SUM(up.servo_press_crimping * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'low_viscosity' AS process,
        SUM(up.low_viscosity * p.[first_month]) AS first_total_shots,
        SUM(up.low_viscosity * p.[second_month]) AS second_total_shots,
        SUM(up.low_viscosity * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'air_water_leak_test2' AS process,
        SUM(up.air_water_leak_test2 * p.[first_month]) AS first_total_shots,
        SUM(up.air_water_leak_test2 * p.[second_month]) AS second_total_shots,
        SUM(up.air_water_leak_test2 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'heatshrink_low_viscosity' AS process,
        SUM(up.heatshrink_low_viscosity * p.[first_month]) AS first_total_shots,
        SUM(up.heatshrink_low_viscosity * p.[second_month]) AS second_total_shots,
        SUM(up.heatshrink_low_viscosity * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'stmac_shieldwire_j12' AS process,
        SUM(up.stmac_shieldwire_j12 * p.[first_month]) AS first_total_shots,
        SUM(up.stmac_shieldwire_j12 * p.[second_month]) AS second_total_shots,
        SUM(up.stmac_shieldwire_j12 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'hirose_sheath_stripping_927r' AS process,
        SUM(up.hirose_sheath_stripping_927r * p.[first_month]) AS first_total_shots,
        SUM(up.hirose_sheath_stripping_927r * p.[second_month]) AS second_total_shots,
        SUM(up.hirose_sheath_stripping_927r * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'hirose_unistrip' AS process,
        SUM(up.hirose_unistrip * p.[first_month]) AS first_total_shots,
        SUM(up.hirose_unistrip * p.[second_month]) AS second_total_shots,
        SUM(up.hirose_unistrip * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'hirose_acetate_taping' AS process,
        SUM(up.hirose_acetate_taping * p.[first_month]) AS first_total_shots,
        SUM(up.hirose_acetate_taping * p.[second_month]) AS second_total_shots,
        SUM(up.hirose_acetate_taping * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'hirose_manual_crimping_2_tons' AS process,
        SUM(up.hirose_manual_crimping_2_tons * p.[first_month]) AS first_total_shots,
        SUM(up.hirose_manual_crimping_2_tons * p.[second_month]) AS second_total_shots,
        SUM(up.hirose_manual_crimping_2_tons * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'hirose_copper_taping' AS process,
        SUM(up.hirose_copper_taping * p.[first_month]) AS first_total_shots,
        SUM(up.hirose_copper_taping * p.[second_month]) AS second_total_shots,
        SUM(up.hirose_copper_taping * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'hirose_hgt17ap_crimping' AS process,
        SUM(up.hirose_hgt17ap_crimping * p.[first_month]) AS first_total_shots,
        SUM(up.hirose_hgt17ap_crimping * p.[second_month]) AS second_total_shots,
        SUM(up.hirose_hgt17ap_crimping * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'stmac_aluminum' AS process,
        SUM(up.stmac_aluminum * p.[first_month]) AS first_total_shots,
        SUM(up.stmac_aluminum * p.[second_month]) AS second_total_shots,
        SUM(up.stmac_aluminum * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'manual_crimping_20tons' AS process,
        SUM(up.manual_crimping_20tons * p.[first_month]) AS first_total_shots,
        SUM(up.manual_crimping_20tons * p.[second_month]) AS second_total_shots,
        SUM(up.manual_crimping_20tons * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'dip_soldering_battery' AS process,
        SUM(up.dip_soldering_battery * p.[first_month]) AS first_total_shots,
        SUM(up.dip_soldering_battery * p.[second_month]) AS second_total_shots,
        SUM(up.dip_soldering_battery * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'ultrasonic_dip_soldering_aluminum' AS process,
        SUM(up.ultrasonic_dip_soldering_aluminum * p.[first_month]) AS first_total_shots,
        SUM(up.ultrasonic_dip_soldering_aluminum * p.[second_month]) AS second_total_shots,
        SUM(up.ultrasonic_dip_soldering_aluminum * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'la_molding' AS process,
        SUM(up.la_molding * p.[first_month]) AS first_total_shots,
        SUM(up.la_molding * p.[second_month]) AS second_total_shots,
        SUM(up.la_molding * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'pressure_welding_sun_visor' AS process,
        SUM(up.pressure_welding_sun_visor * p.[first_month]) AS first_total_shots,
        SUM(up.pressure_welding_sun_visor * p.[second_month]) AS second_total_shots,
        SUM(up.pressure_welding_sun_visor * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'pressure_welding_dome_lamp' AS process,
        SUM(up.pressure_welding_dome_lamp * p.[first_month]) AS first_total_shots,
        SUM(up.pressure_welding_dome_lamp * p.[second_month]) AS second_total_shots,
        SUM(up.pressure_welding_dome_lamp * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'casting_c377a' AS process,
        SUM(up.casting_c377a * p.[first_month]) AS first_total_shots,
        SUM(up.casting_c377a * p.[second_month]) AS second_total_shots,
        SUM(up.casting_c377a * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'coaxstrip_6580' AS process,
        SUM(up.coaxstrip_6580 * p.[first_month]) AS first_total_shots,
        SUM(up.coaxstrip_6580 * p.[second_month]) AS second_total_shots,
        SUM(up.coaxstrip_6580 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'manual_crimping_2t_ferrule' AS process,
        SUM(up.manual_crimping_2t_ferrule * p.[first_month]) AS first_total_shots,
        SUM(up.manual_crimping_2t_ferrule * p.[second_month]) AS second_total_shots,
        SUM(up.manual_crimping_2t_ferrule * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'ferrule_auto_crimping' AS process,
        SUM(up.ferrule_auto_crimping * p.[first_month]) AS first_total_shots,
        SUM(up.ferrule_auto_crimping * p.[second_month]) AS second_total_shots,
        SUM(up.ferrule_auto_crimping * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'enlarge_terminal_inspection' AS process,
        SUM(up.enlarge_terminal_inspection * p.[first_month]) AS first_total_shots,
        SUM(up.enlarge_terminal_inspection * p.[second_month]) AS second_total_shots,
        SUM(up.enlarge_terminal_inspection * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'waterproof_pad_press' AS process,
        SUM(up.waterproof_pad_press * p.[first_month]) AS first_total_shots,
        SUM(up.waterproof_pad_press * p.[second_month]) AS second_total_shots,
        SUM(up.waterproof_pad_press * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'parts_insertion' AS process,
        SUM(up.parts_insertion * p.[first_month]) AS first_total_shots,
        SUM(up.parts_insertion * p.[second_month]) AS second_total_shots,
        SUM(up.parts_insertion * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'braided_wire_folding' AS process,
        SUM(up.braided_wire_folding * p.[first_month]) AS first_total_shots,
        SUM(up.braided_wire_folding * p.[second_month]) AS second_total_shots,
        SUM(up.braided_wire_folding * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'outside_ferrule_insertion' AS process,
        SUM(up.outside_ferrule_insertion * p.[first_month]) AS first_total_shots,
        SUM(up.outside_ferrule_insertion * p.[second_month]) AS second_total_shots,
        SUM(up.outside_ferrule_insertion * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'joint_crimping_2t' AS process,
        SUM(up.joint_crimping_2t * p.[first_month]) AS first_total_shots,
        SUM(up.joint_crimping_2t * p.[second_month]) AS second_total_shots,
        SUM(up.joint_crimping_2t * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'welding_at_head' AS process,
        SUM(up.welding_at_head * p.[first_month]) AS first_total_shots,
        SUM(up.welding_at_head * p.[second_month]) AS second_total_shots,
        SUM(up.welding_at_head * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'welding_taping' AS process,
        SUM(up.welding_taping * p.[first_month]) AS first_total_shots,
        SUM(up.welding_taping * p.[second_month]) AS second_total_shots,
        SUM(up.welding_taping * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'uv_iii_1' AS process,
        SUM(up.uv_iii_1 * p.[first_month]) AS first_total_shots,
        SUM(up.uv_iii_1 * p.[second_month]) AS second_total_shots,
        SUM(up.uv_iii_1 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'uv_iii_2' AS process,
        SUM(up.uv_iii_2 * p.[first_month]) AS first_total_shots,
        SUM(up.uv_iii_2 * p.[second_month]) AS second_total_shots,
        SUM(up.uv_iii_2 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'uv_iii_4' AS process,
        SUM(up.uv_iii_4 * p.[first_month]) AS first_total_shots,
        SUM(up.uv_iii_4 * p.[second_month]) AS second_total_shots,
        SUM(up.uv_iii_4 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'uv_iii_5' AS process,
        SUM(up.uv_iii_5 * p.[first_month]) AS first_total_shots,
        SUM(up.uv_iii_5 * p.[second_month]) AS second_total_shots,
        SUM(up.uv_iii_5 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'uv_iii_7' AS process,
        SUM(up.uv_iii_7 * p.[first_month]) AS first_total_shots,
        SUM(up.uv_iii_7 * p.[second_month]) AS second_total_shots,
        SUM(up.uv_iii_7 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'uv_iii_8' AS process,
        SUM(up.uv_iii_8 * p.[first_month]) AS first_total_shots,
        SUM(up.uv_iii_8 * p.[second_month]) AS second_total_shots,
        SUM(up.uv_iii_8 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'drainwire_tip' AS process,
        SUM(up.drainwire_tip * p.[first_month]) AS first_total_shots,
        SUM(up.drainwire_tip * p.[second_month]) AS second_total_shots,
        SUM(up.drainwire_tip * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'arc_welding' AS process,
        SUM(up.arc_welding * p.[first_month]) AS first_total_shots,
        SUM(up.arc_welding * p.[second_month]) AS second_total_shots,
        SUM(up.arc_welding * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'c373a_yamaha' AS process,
        SUM(up.c373a_yamaha * p.[first_month]) AS first_total_shots,
        SUM(up.c373a_yamaha * p.[second_month]) AS second_total_shots,
        SUM(up.c373a_yamaha * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'cocripper' AS process,
        SUM(up.cocripper * p.[first_month]) AS first_total_shots,
        SUM(up.cocripper * p.[second_month]) AS second_total_shots,
        SUM(up.cocripper * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        up.[car_model],
        'quickstripping' AS process,
        SUM(up.quickstripping * p.[first_month]) AS first_total_shots,
        SUM(up.quickstripping * p.[second_month]) AS second_total_shots,
        SUM(up.quickstripping * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[unique_process] AS up
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON up.[base_product] = p.[base_product]
    GROUP BY 
        up.[car_model]
UNION ALL
SELECT 
        np.[car_model],
        'airbag_housing' AS process,
        SUM(np.airbag_housing * p.[first_month]) AS first_total_shots,
        SUM(np.airbag_housing * p.[second_month]) AS second_total_shots,
        SUM(np.airbag_housing * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[non_machine_process] AS np
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON np.[base_product] = p.[base_product]
    GROUP BY 
        np.[car_model]
UNION ALL
SELECT 
        np.[car_model],
        'cap_insertion' AS process,
        SUM(np.cap_insertion * p.[first_month]) AS first_total_shots,
        SUM(np.cap_insertion * p.[second_month]) AS second_total_shots,
        SUM(np.cap_insertion * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[non_machine_process] AS np
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON np.[base_product] = p.[base_product]
    GROUP BY 
        np.[car_model]
UNION ALL
SELECT 
        np.[car_model],
        'shieldwire_taping' AS process,
        SUM(np.shieldwire_taping * p.[first_month]) AS first_total_shots,
        SUM(np.shieldwire_taping * p.[second_month]) AS second_total_shots,
        SUM(np.shieldwire_taping * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[non_machine_process] AS np
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON np.[base_product] = p.[base_product]
    GROUP BY 
        np.[car_model]
UNION ALL
SELECT 
        np.[car_model],
        'gomusen_insertion' AS process,
        SUM(np.gomusen_insertion * p.[first_month]) AS first_total_shots,
        SUM(np.gomusen_insertion * p.[second_month]) AS second_total_shots,
        SUM(np.gomusen_insertion * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[non_machine_process] AS np
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON np.[base_product] = p.[base_product]
    GROUP BY 
        np.[car_model]
UNION ALL
SELECT 
        np.[car_model],
        'point_marking' AS process,
        SUM(np.point_marking * p.[first_month]) AS first_total_shots,
        SUM(np.point_marking * p.[second_month]) AS second_total_shots,
        SUM(np.point_marking * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[non_machine_process] AS np
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON np.[base_product] = p.[base_product]
    GROUP BY 
        np.[car_model]
UNION ALL
SELECT 
        np.[car_model],
        'looping' AS process,
        SUM(np.looping * p.[first_month]) AS first_total_shots,
        SUM(np.looping * p.[second_month]) AS second_total_shots,
        SUM(np.looping * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[non_machine_process] AS np
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON np.[base_product] = p.[base_product]
    GROUP BY 
        np.[car_model]
UNION ALL
SELECT 
        np.[car_model],
        'shikakari_handler' AS process,
        SUM(np.shikakari_handler * p.[first_month]) AS first_total_shots,
        SUM(np.shikakari_handler * p.[second_month]) AS second_total_shots,
        SUM(np.shikakari_handler * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[non_machine_process] AS np
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON np.[base_product] = p.[base_product]
    GROUP BY 
        np.[car_model]
UNION ALL
SELECT 
        np.[car_model],
        'black_taping' AS process,
        SUM(np.black_taping * p.[first_month]) AS first_total_shots,
        SUM(np.black_taping * p.[second_month]) AS second_total_shots,
        SUM(np.black_taping * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[non_machine_process] AS np
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON np.[base_product] = p.[base_product]
    GROUP BY 
        np.[car_model]
UNION ALL
SELECT 
        np.[car_model],
        'components_insertion' AS process,
        SUM(np.components_insertion * p.[first_month]) AS first_total_shots,
        SUM(np.components_insertion * p.[second_month]) AS second_total_shots,
        SUM(np.components_insertion * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[non_machine_process] AS np
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON np.[base_product] = p.[base_product]
    GROUP BY 
        np.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'joint_crimping_2tons_ps_800_s_2' AS process,
        SUM(sp.joint_crimping_2tons_ps_800_s_2 * p.[first_month]) AS first_total_shots,
        SUM(sp.joint_crimping_2tons_ps_800_s_2 * p.[second_month]) AS second_total_shots,
        SUM(sp.joint_crimping_2tons_ps_800_s_2 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'joint_crimping_2tons_ps_200_m_2' AS process,
        SUM(sp.joint_crimping_2tons_ps_200_m_2 * p.[first_month]) AS first_total_shots,
        SUM(sp.joint_crimping_2tons_ps_200_m_2 * p.[second_month]) AS second_total_shots,
        SUM(sp.joint_crimping_2tons_ps_200_m_2 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'joint_crimping_2tons_ps_017_ss_2' AS process,
        SUM(sp.joint_crimping_2tons_ps_017_ss_2 * p.[first_month]) AS first_total_shots,
        SUM(sp.joint_crimping_2tons_ps_017_ss_2 * p.[second_month]) AS second_total_shots,
        SUM(sp.joint_crimping_2tons_ps_017_ss_2 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'joint_crimping_2tons_ps_126_sst2' AS process,
        SUM(sp.joint_crimping_2tons_ps_126_sst2 * p.[first_month]) AS first_total_shots,
        SUM(sp.joint_crimping_2tons_ps_126_sst2 * p.[second_month]) AS second_total_shots,
        SUM(sp.joint_crimping_2tons_ps_126_sst2 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'joint_crimping_4tons_ps_700_l_2' AS process,
        SUM(sp.joint_crimping_4tons_ps_700_l_2 * p.[first_month]) AS first_total_shots,
        SUM(sp.joint_crimping_4tons_ps_700_l_2 * p.[second_month]) AS second_total_shots,
        SUM(sp.joint_crimping_4tons_ps_700_l_2 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'joint_crimping_5tons_ps_150_ll' AS process,
        SUM(sp.joint_crimping_5tons_ps_150_ll * p.[first_month]) AS first_total_shots,
        SUM(sp.joint_crimping_5tons_ps_150_ll * p.[second_month]) AS second_total_shots,
        SUM(sp.joint_crimping_5tons_ps_150_ll * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'manual_crimping_shieldwire_2t' AS process,
        SUM(sp.manual_crimping_shieldwire_2t * p.[first_month]) AS first_total_shots,
        SUM(sp.manual_crimping_shieldwire_2t * p.[second_month]) AS second_total_shots,
        SUM(sp.manual_crimping_shieldwire_2t * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'manual_crimping_shieldwire_4t' AS process,
        SUM(sp.manual_crimping_shieldwire_4t * p.[first_month]) AS first_total_shots,
        SUM(sp.manual_crimping_shieldwire_4t * p.[second_month]) AS second_total_shots,
        SUM(sp.manual_crimping_shieldwire_4t * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'joint_crimping_2tons_ps_800_s_2_sw' AS process,
        SUM(sp.joint_crimping_2tons_ps_800_s_2_sw * p.[first_month]) AS first_total_shots,
        SUM(sp.joint_crimping_2tons_ps_800_s_2_sw * p.[second_month]) AS second_total_shots,
        SUM(sp.joint_crimping_2tons_ps_800_s_2_sw * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'joint_crimping_2tons_ps_126_sst2_sw' AS process,
        SUM(sp.joint_crimping_2tons_ps_126_sst2_sw * p.[first_month]) AS first_total_shots,
        SUM(sp.joint_crimping_2tons_ps_126_sst2_sw * p.[second_month]) AS second_total_shots,
        SUM(sp.joint_crimping_2tons_ps_126_sst2_sw * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'joint_crimping_2tons_ps_017_ss_2_sw' AS process,
        SUM(sp.joint_crimping_2tons_ps_017_ss_2_sw * p.[first_month]) AS first_total_shots,
        SUM(sp.joint_crimping_2tons_ps_017_ss_2_sw * p.[second_month]) AS second_total_shots,
        SUM(sp.joint_crimping_2tons_ps_017_ss_2_sw * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'twisting_primary_normal_wires_l_less_than_1500mm' AS process,
        SUM(sp.twisting_primary_normal_wires_l_less_than_1500mm * p.[first_month]) AS first_total_shots,
        SUM(sp.twisting_primary_normal_wires_l_less_than_1500mm * p.[second_month]) AS second_total_shots,
        SUM(sp.twisting_primary_normal_wires_l_less_than_1500mm * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'twisting_primary_normal_wires_l_less_than_3000mm' AS process,
        SUM(sp.twisting_primary_normal_wires_l_less_than_3000mm * p.[first_month]) AS first_total_shots,
        SUM(sp.twisting_primary_normal_wires_l_less_than_3000mm * p.[second_month]) AS second_total_shots,
        SUM(sp.twisting_primary_normal_wires_l_less_than_3000mm * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'twisting_primary_normal_wires_l_less_than_4500mm' AS process,
        SUM(sp.twisting_primary_normal_wires_l_less_than_4500mm * p.[first_month]) AS first_total_shots,
        SUM(sp.twisting_primary_normal_wires_l_less_than_4500mm * p.[second_month]) AS second_total_shots,
        SUM(sp.twisting_primary_normal_wires_l_less_than_4500mm * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'twisting_primary_normal_wires_l_less_than_6000mm' AS process,
        SUM(sp.twisting_primary_normal_wires_l_less_than_6000mm * p.[first_month]) AS first_total_shots,
        SUM(sp.twisting_primary_normal_wires_l_less_than_6000mm * p.[second_month]) AS second_total_shots,
        SUM(sp.twisting_primary_normal_wires_l_less_than_6000mm * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'twisting_primary_normal_wires_l_less_than_7500mm' AS process,
        SUM(sp.twisting_primary_normal_wires_l_less_than_7500mm * p.[first_month]) AS first_total_shots,
        SUM(sp.twisting_primary_normal_wires_l_less_than_7500mm * p.[second_month]) AS second_total_shots,
        SUM(sp.twisting_primary_normal_wires_l_less_than_7500mm * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'twisting_primary_normal_wires_l_less_than_9000mm' AS process,
        SUM(sp.twisting_primary_normal_wires_l_less_than_9000mm * p.[first_month]) AS first_total_shots,
        SUM(sp.twisting_primary_normal_wires_l_less_than_9000mm * p.[second_month]) AS second_total_shots,
        SUM(sp.twisting_primary_normal_wires_l_less_than_9000mm * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'twisting_secondary_normal_wires_l_less_than_1500mm' AS process,
        SUM(sp.twisting_secondary_normal_wires_l_less_than_1500mm * p.[first_month]) AS first_total_shots,
        SUM(sp.twisting_secondary_normal_wires_l_less_than_1500mm * p.[second_month]) AS second_total_shots,
        SUM(sp.twisting_secondary_normal_wires_l_less_than_1500mm * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'twisting_secondary_normal_wires_l_less_than_3000mm' AS process,
        SUM(sp.twisting_secondary_normal_wires_l_less_than_3000mm * p.[first_month]) AS first_total_shots,
        SUM(sp.twisting_secondary_normal_wires_l_less_than_3000mm * p.[second_month]) AS second_total_shots,
        SUM(sp.twisting_secondary_normal_wires_l_less_than_3000mm * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'twisting_secondary_normal_wires_l_less_than_4500mm' AS process,
        SUM(sp.twisting_secondary_normal_wires_l_less_than_4500mm * p.[first_month]) AS first_total_shots,
        SUM(sp.twisting_secondary_normal_wires_l_less_than_4500mm * p.[second_month]) AS second_total_shots,
        SUM(sp.twisting_secondary_normal_wires_l_less_than_4500mm * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'twisting_secondary_normal_wires_l_less_than_6000mm' AS process,
        SUM(sp.twisting_secondary_normal_wires_l_less_than_6000mm * p.[first_month]) AS first_total_shots,
        SUM(sp.twisting_secondary_normal_wires_l_less_than_6000mm * p.[second_month]) AS second_total_shots,
        SUM(sp.twisting_secondary_normal_wires_l_less_than_6000mm * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'twisting_secondary_normal_wires_l_less_than_7500mm' AS process,
        SUM(sp.twisting_secondary_normal_wires_l_less_than_7500mm * p.[first_month]) AS first_total_shots,
        SUM(sp.twisting_secondary_normal_wires_l_less_than_7500mm * p.[second_month]) AS second_total_shots,
        SUM(sp.twisting_secondary_normal_wires_l_less_than_7500mm * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'twisting_secondary_normal_wires_l_less_than_9000mm' AS process,
        SUM(sp.twisting_secondary_normal_wires_l_less_than_9000mm * p.[first_month]) AS first_total_shots,
        SUM(sp.twisting_secondary_normal_wires_l_less_than_9000mm * p.[second_month]) AS second_total_shots,
        SUM(sp.twisting_secondary_normal_wires_l_less_than_9000mm * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'twisting_primary_aluminum_wires_l_less_than_1500mm' AS process,
        SUM(sp.twisting_primary_aluminum_wires_l_less_than_1500mm * p.[first_month]) AS first_total_shots,
        SUM(sp.twisting_primary_aluminum_wires_l_less_than_1500mm * p.[second_month]) AS second_total_shots,
        SUM(sp.twisting_primary_aluminum_wires_l_less_than_1500mm * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'twisting_primary_aluminum_wires_l_less_than_3000mm' AS process,
        SUM(sp.twisting_primary_aluminum_wires_l_less_than_3000mm * p.[first_month]) AS first_total_shots,
        SUM(sp.twisting_primary_aluminum_wires_l_less_than_3000mm * p.[second_month]) AS second_total_shots,
        SUM(sp.twisting_primary_aluminum_wires_l_less_than_3000mm * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'twisting_primary_aluminum_wires_l_less_than_4500mm' AS process,
        SUM(sp.twisting_primary_aluminum_wires_l_less_than_4500mm * p.[first_month]) AS first_total_shots,
        SUM(sp.twisting_primary_aluminum_wires_l_less_than_4500mm * p.[second_month]) AS second_total_shots,
        SUM(sp.twisting_primary_aluminum_wires_l_less_than_4500mm * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'twisting_primary_aluminum_wires_l_less_than_6000mm' AS process,
        SUM(sp.twisting_primary_aluminum_wires_l_less_than_6000mm * p.[first_month]) AS first_total_shots,
        SUM(sp.twisting_primary_aluminum_wires_l_less_than_6000mm * p.[second_month]) AS second_total_shots,
        SUM(sp.twisting_primary_aluminum_wires_l_less_than_6000mm * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'twisting_secondary_aluminum_wires_l_less_than_1500mm' AS process,
        SUM(sp.twisting_secondary_aluminum_wires_l_less_than_1500mm * p.[first_month]) AS first_total_shots,
        SUM(sp.twisting_secondary_aluminum_wires_l_less_than_1500mm * p.[second_month]) AS second_total_shots,
        SUM(sp.twisting_secondary_aluminum_wires_l_less_than_1500mm * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'twisting_secondary_aluminum_wires_l_less_than_3000mm' AS process,
        SUM(sp.twisting_secondary_aluminum_wires_l_less_than_3000mm * p.[first_month]) AS first_total_shots,
        SUM(sp.twisting_secondary_aluminum_wires_l_less_than_3000mm * p.[second_month]) AS second_total_shots,
        SUM(sp.twisting_secondary_aluminum_wires_l_less_than_3000mm * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'twisting_secondary_aluminum_wires_l_less_than_4500mm' AS process,
        SUM(sp.twisting_secondary_aluminum_wires_l_less_than_4500mm * p.[first_month]) AS first_total_shots,
        SUM(sp.twisting_secondary_aluminum_wires_l_less_than_4500mm * p.[second_month]) AS second_total_shots,
        SUM(sp.twisting_secondary_aluminum_wires_l_less_than_4500mm * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'twisting_secondary_aluminum_wires_l_less_than_6000mm' AS process,
        SUM(sp.twisting_secondary_aluminum_wires_l_less_than_6000mm * p.[first_month]) AS first_total_shots,
        SUM(sp.twisting_secondary_aluminum_wires_l_less_than_6000mm * p.[second_month]) AS second_total_shots,
        SUM(sp.twisting_secondary_aluminum_wires_l_less_than_6000mm * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'twisting_secondary_aluminum_wires_l_less_than_7500mm' AS process,
        SUM(sp.twisting_secondary_aluminum_wires_l_less_than_7500mm * p.[first_month]) AS first_total_shots,
        SUM(sp.twisting_secondary_aluminum_wires_l_less_than_7500mm * p.[second_month]) AS second_total_shots,
        SUM(sp.twisting_secondary_aluminum_wires_l_less_than_7500mm * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'twisting_secondary_aluminum_wires_l_less_than_9000mm' AS process,
        SUM(sp.twisting_secondary_aluminum_wires_l_less_than_9000mm * p.[first_month]) AS first_total_shots,
        SUM(sp.twisting_secondary_aluminum_wires_l_less_than_9000mm * p.[second_month]) AS second_total_shots,
        SUM(sp.twisting_secondary_aluminum_wires_l_less_than_9000mm * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'manual_crimping_2tons_normal_single_crimp' AS process,
        SUM(sp.manual_crimping_2tons_normal_single_crimp * p.[first_month]) AS first_total_shots,
        SUM(sp.manual_crimping_2tons_normal_single_crimp * p.[second_month]) AS second_total_shots,
        SUM(sp.manual_crimping_2tons_normal_single_crimp * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'manual_crimping_2tons_normal_double_crimp' AS process,
        SUM(sp.manual_crimping_2tons_normal_double_crimp * p.[first_month]) AS first_total_shots,
        SUM(sp.manual_crimping_2tons_normal_double_crimp * p.[second_month]) AS second_total_shots,
        SUM(sp.manual_crimping_2tons_normal_double_crimp * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'manual_crimping_2tons_double_crimp_twisted' AS process,
        SUM(sp.manual_crimping_2tons_double_crimp_twisted * p.[first_month]) AS first_total_shots,
        SUM(sp.manual_crimping_2tons_double_crimp_twisted * p.[second_month]) AS second_total_shots,
        SUM(sp.manual_crimping_2tons_double_crimp_twisted * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'manual_crimping_2tons_la_terminal' AS process,
        SUM(sp.manual_crimping_2tons_la_terminal * p.[first_month]) AS first_total_shots,
        SUM(sp.manual_crimping_2tons_la_terminal * p.[second_month]) AS second_total_shots,
        SUM(sp.manual_crimping_2tons_la_terminal * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'manual_crimping_2tons_double_crimp_la_terminal' AS process,
        SUM(sp.manual_crimping_2tons_double_crimp_la_terminal * p.[first_month]) AS first_total_shots,
        SUM(sp.manual_crimping_2tons_double_crimp_la_terminal * p.[second_month]) AS second_total_shots,
        SUM(sp.manual_crimping_2tons_double_crimp_la_terminal * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'manual_crimping_2tons_w_gomusen' AS process,
        SUM(sp.manual_crimping_2tons_w_gomusen * p.[first_month]) AS first_total_shots,
        SUM(sp.manual_crimping_2tons_w_gomusen * p.[second_month]) AS second_total_shots,
        SUM(sp.manual_crimping_2tons_w_gomusen * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'manual_crimping_4tons_double_crimp_twisted' AS process,
        SUM(sp.manual_crimping_4tons_double_crimp_twisted * p.[first_month]) AS first_total_shots,
        SUM(sp.manual_crimping_4tons_double_crimp_twisted * p.[second_month]) AS second_total_shots,
        SUM(sp.manual_crimping_4tons_double_crimp_twisted * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'manual_crimping_4tons_normal_single_crimp' AS process,
        SUM(sp.manual_crimping_4tons_normal_single_crimp * p.[first_month]) AS first_total_shots,
        SUM(sp.manual_crimping_4tons_normal_single_crimp * p.[second_month]) AS second_total_shots,
        SUM(sp.manual_crimping_4tons_normal_single_crimp * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'manual_crimping_4tons_normal_double_crimp' AS process,
        SUM(sp.manual_crimping_4tons_normal_double_crimp * p.[first_month]) AS first_total_shots,
        SUM(sp.manual_crimping_4tons_normal_double_crimp * p.[second_month]) AS second_total_shots,
        SUM(sp.manual_crimping_4tons_normal_double_crimp * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'manual_crimping_4tons_la_terminal' AS process,
        SUM(sp.manual_crimping_4tons_la_terminal * p.[first_month]) AS first_total_shots,
        SUM(sp.manual_crimping_4tons_la_terminal * p.[second_month]) AS second_total_shots,
        SUM(sp.manual_crimping_4tons_la_terminal * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'manual_crimping_4tons_double_crimp_la_terminal' AS process,
        SUM(sp.manual_crimping_4tons_double_crimp_la_terminal * p.[first_month]) AS first_total_shots,
        SUM(sp.manual_crimping_4tons_double_crimp_la_terminal * p.[second_month]) AS second_total_shots,
        SUM(sp.manual_crimping_4tons_double_crimp_la_terminal * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'manual_crimping_4tons_w_gomusen' AS process,
        SUM(sp.manual_crimping_4tons_w_gomusen * p.[first_month]) AS first_total_shots,
        SUM(sp.manual_crimping_4tons_w_gomusen * p.[second_month]) AS second_total_shots,
        SUM(sp.manual_crimping_4tons_w_gomusen * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'manual_crimping_5tons' AS process,
        SUM(sp.manual_crimping_5tons * p.[first_month]) AS first_total_shots,
        SUM(sp.manual_crimping_5tons * p.[second_month]) AS second_total_shots,
        SUM(sp.manual_crimping_5tons * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'intermediate_butt_welding_except_0_13_electrode_1' AS process,
        SUM(sp.intermediate_butt_welding_except_0_13_electrode_1 * p.[first_month]) AS first_total_shots,
        SUM(sp.intermediate_butt_welding_except_0_13_electrode_1 * p.[second_month]) AS second_total_shots,
        SUM(sp.intermediate_butt_welding_except_0_13_electrode_1 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'intermediate_butt_welding_except_0_13_electrode_2' AS process,
        SUM(sp.intermediate_butt_welding_except_0_13_electrode_2 * p.[first_month]) AS first_total_shots,
        SUM(sp.intermediate_butt_welding_except_0_13_electrode_2 * p.[second_month]) AS second_total_shots,
        SUM(sp.intermediate_butt_welding_except_0_13_electrode_2 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'intermediate_butt_welding_except_0_13_electrode_3' AS process,
        SUM(sp.intermediate_butt_welding_except_0_13_electrode_3 * p.[first_month]) AS first_total_shots,
        SUM(sp.intermediate_butt_welding_except_0_13_electrode_3 * p.[second_month]) AS second_total_shots,
        SUM(sp.intermediate_butt_welding_except_0_13_electrode_3 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'intermediate_butt_welding_except_0_13_electrode_4' AS process,
        SUM(sp.intermediate_butt_welding_except_0_13_electrode_4 * p.[first_month]) AS first_total_shots,
        SUM(sp.intermediate_butt_welding_except_0_13_electrode_4 * p.[second_month]) AS second_total_shots,
        SUM(sp.intermediate_butt_welding_except_0_13_electrode_4 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'intermediate_butt_welding_except_0_13_electrode_5' AS process,
        SUM(sp.intermediate_butt_welding_except_0_13_electrode_5 * p.[first_month]) AS first_total_shots,
        SUM(sp.intermediate_butt_welding_except_0_13_electrode_5 * p.[second_month]) AS second_total_shots,
        SUM(sp.intermediate_butt_welding_except_0_13_electrode_5 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'welding_at_head_except_0_13_electrode_1' AS process,
        SUM(sp.welding_at_head_except_0_13_electrode_1 * p.[first_month]) AS first_total_shots,
        SUM(sp.welding_at_head_except_0_13_electrode_1 * p.[second_month]) AS second_total_shots,
        SUM(sp.welding_at_head_except_0_13_electrode_1 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'welding_at_head_except_0_13_electrode_2' AS process,
        SUM(sp.welding_at_head_except_0_13_electrode_2 * p.[first_month]) AS first_total_shots,
        SUM(sp.welding_at_head_except_0_13_electrode_2 * p.[second_month]) AS second_total_shots,
        SUM(sp.welding_at_head_except_0_13_electrode_2 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'welding_at_head_except_0_13_electrode_3' AS process,
        SUM(sp.welding_at_head_except_0_13_electrode_3 * p.[first_month]) AS first_total_shots,
        SUM(sp.welding_at_head_except_0_13_electrode_3 * p.[second_month]) AS second_total_shots,
        SUM(sp.welding_at_head_except_0_13_electrode_3 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'welding_at_head_except_0_13_electrode_4' AS process,
        SUM(sp.welding_at_head_except_0_13_electrode_4 * p.[first_month]) AS first_total_shots,
        SUM(sp.welding_at_head_except_0_13_electrode_4 * p.[second_month]) AS second_total_shots,
        SUM(sp.welding_at_head_except_0_13_electrode_4 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'welding_at_head_except_0_13_electrode_5' AS process,
        SUM(sp.welding_at_head_except_0_13_electrode_5 * p.[first_month]) AS first_total_shots,
        SUM(sp.welding_at_head_except_0_13_electrode_5 * p.[second_month]) AS second_total_shots,
        SUM(sp.welding_at_head_except_0_13_electrode_5 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'intermediate_butt_welding_0_13_electrode_1' AS process,
        SUM(sp.intermediate_butt_welding_0_13_electrode_1 * p.[first_month]) AS first_total_shots,
        SUM(sp.intermediate_butt_welding_0_13_electrode_1 * p.[second_month]) AS second_total_shots,
        SUM(sp.intermediate_butt_welding_0_13_electrode_1 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'welding_at_head_0_13_electrode_1' AS process,
        SUM(sp.welding_at_head_0_13_electrode_1 * p.[first_month]) AS first_total_shots,
        SUM(sp.welding_at_head_0_13_electrode_1 * p.[second_month]) AS second_total_shots,
        SUM(sp.welding_at_head_0_13_electrode_1 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'intermediate_butt_welding_0_13_electrode_2' AS process,
        SUM(sp.intermediate_butt_welding_0_13_electrode_2 * p.[first_month]) AS first_total_shots,
        SUM(sp.intermediate_butt_welding_0_13_electrode_2 * p.[second_month]) AS second_total_shots,
        SUM(sp.intermediate_butt_welding_0_13_electrode_2 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        sp.[car_model],
        'welding_at_head_0_13_electrode_2' AS process,
        SUM(sp.welding_at_head_0_13_electrode_2 * p.[first_month]) AS first_total_shots,
        SUM(sp.welding_at_head_0_13_electrode_2 * p.[second_month]) AS second_total_shots,
        SUM(sp.welding_at_head_0_13_electrode_2 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[secondary_process] AS sp
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON sp.[base_product] = p.[base_product]
    GROUP BY 
        sp.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'v_type_twisting' AS process,
        SUM(op.v_type_twisting * p.[first_month]) AS first_total_shots,
        SUM(op.v_type_twisting * p.[second_month]) AS second_total_shots,
        SUM(op.v_type_twisting * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'manual_crimping_2tons_to_be_joint_on_sw' AS process,
        SUM(op.manual_crimping_2tons_to_be_joint_on_sw * p.[first_month]) AS first_total_shots,
        SUM(op.manual_crimping_2tons_to_be_joint_on_sw * p.[second_month]) AS second_total_shots,
        SUM(op.manual_crimping_2tons_to_be_joint_on_sw * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'airbag' AS process,
        SUM(op.airbag * p.[first_month]) AS first_total_shots,
        SUM(op.airbag * p.[second_month]) AS second_total_shots,
        SUM(op.airbag * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'a_b_sub_pc' AS process,
        SUM(op.a_b_sub_pc * p.[first_month]) AS first_total_shots,
        SUM(op.a_b_sub_pc * p.[second_month]) AS second_total_shots,
        SUM(op.a_b_sub_pc * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'intermediate_ripping_uas_manual_nf_f' AS process,
        SUM(op.intermediate_ripping_uas_manual_nf_f * p.[first_month]) AS first_total_shots,
        SUM(op.intermediate_ripping_uas_manual_nf_f * p.[second_month]) AS second_total_shots,
        SUM(op.intermediate_ripping_uas_manual_nf_f * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'manual_crimping_4tons_nf_f' AS process,
        SUM(op.manual_crimping_4tons_nf_f * p.[first_month]) AS first_total_shots,
        SUM(op.manual_crimping_4tons_nf_f * p.[second_month]) AS second_total_shots,
        SUM(op.manual_crimping_4tons_nf_f * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'intermediate_ripping_uas_joint' AS process,
        SUM(op.intermediate_ripping_uas_joint * p.[first_month]) AS first_total_shots,
        SUM(op.intermediate_ripping_uas_joint * p.[second_month]) AS second_total_shots,
        SUM(op.intermediate_ripping_uas_joint * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'intermediate_stripping_kb10' AS process,
        SUM(op.intermediate_stripping_kb10 * p.[first_month]) AS first_total_shots,
        SUM(op.intermediate_stripping_kb10 * p.[second_month]) AS second_total_shots,
        SUM(op.intermediate_stripping_kb10 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22' AS process,
        SUM(op.manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22 * p.[first_month]) AS first_total_shots,
        SUM(op.manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22 * p.[second_month]) AS second_total_shots,
        SUM(op.manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'joint_taping_11mm_ps_150_ll_2' AS process,
        SUM(op.joint_taping_11mm_ps_150_ll_2 * p.[first_month]) AS first_total_shots,
        SUM(op.joint_taping_11mm_ps_150_ll_2 * p.[second_month]) AS second_total_shots,
        SUM(op.joint_taping_11mm_ps_150_ll_2 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'joint_taping_12mm_ps_700_l_2_ps_200_m_2' AS process,
        SUM(op.joint_taping_12mm_ps_700_l_2_ps_200_m_2 * p.[first_month]) AS first_total_shots,
        SUM(op.joint_taping_12mm_ps_700_l_2_ps_200_m_2 * p.[second_month]) AS second_total_shots,
        SUM(op.joint_taping_12mm_ps_700_l_2_ps_200_m_2 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2' AS process,
        SUM(op.joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2 * p.[first_month]) AS first_total_shots,
        SUM(op.joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2 * p.[second_month]) AS second_total_shots,
        SUM(op.joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'heat_shrink_joint_crimping' AS process,
        SUM(op.heat_shrink_joint_crimping * p.[first_month]) AS first_total_shots,
        SUM(op.heat_shrink_joint_crimping * p.[second_month]) AS second_total_shots,
        SUM(op.heat_shrink_joint_crimping * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'heat_shrink_la_terminal' AS process,
        SUM(op.heat_shrink_la_terminal * p.[first_month]) AS first_total_shots,
        SUM(op.heat_shrink_la_terminal * p.[second_month]) AS second_total_shots,
        SUM(op.heat_shrink_la_terminal * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'manual_crimping_2tons_nsc_weld' AS process,
        SUM(op.manual_crimping_2tons_nsc_weld * p.[first_month]) AS first_total_shots,
        SUM(op.manual_crimping_2tons_nsc_weld * p.[second_month]) AS second_total_shots,
        SUM(op.manual_crimping_2tons_nsc_weld * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'intermediate_stripping_kb10_nsc_weld' AS process,
        SUM(op.intermediate_stripping_kb10_nsc_weld * p.[first_month]) AS first_total_shots,
        SUM(op.intermediate_stripping_kb10_nsc_weld * p.[second_month]) AS second_total_shots,
        SUM(op.intermediate_stripping_kb10_nsc_weld * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'joint_crimping_2tons_ps_017_ss_2_nsc_weld' AS process,
        SUM(op.joint_crimping_2tons_ps_017_ss_2_nsc_weld * p.[first_month]) AS first_total_shots,
        SUM(op.joint_crimping_2tons_ps_017_ss_2_nsc_weld * p.[second_month]) AS second_total_shots,
        SUM(op.joint_crimping_2tons_ps_017_ss_2_nsc_weld * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld' AS process,
        SUM(op.joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld * p.[first_month]) AS first_total_shots,
        SUM(op.joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld * p.[second_month]) AS second_total_shots,
        SUM(op.joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'silicon_injection' AS process,
        SUM(op.silicon_injection * p.[first_month]) AS first_total_shots,
        SUM(op.silicon_injection * p.[second_month]) AS second_total_shots,
        SUM(op.silicon_injection * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'welding_taping_13mm' AS process,
        SUM(op.welding_taping_13mm * p.[first_month]) AS first_total_shots,
        SUM(op.welding_taping_13mm * p.[second_month]) AS second_total_shots,
        SUM(op.welding_taping_13mm * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'heat_shrink_welding' AS process,
        SUM(op.heat_shrink_welding * p.[first_month]) AS first_total_shots,
        SUM(op.heat_shrink_welding * p.[second_month]) AS second_total_shots,
        SUM(op.heat_shrink_welding * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'casting_c385_shieldwire' AS process,
        SUM(op.casting_c385_shieldwire * p.[first_month]) AS first_total_shots,
        SUM(op.casting_c385_shieldwire * p.[second_month]) AS second_total_shots,
        SUM(op.casting_c385_shieldwire * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'quick_stripping_927_auto' AS process,
        SUM(op.quick_stripping_927_auto * p.[first_month]) AS first_total_shots,
        SUM(op.quick_stripping_927_auto * p.[second_month]) AS second_total_shots,
        SUM(op.quick_stripping_927_auto * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'mira_quick_stripping' AS process,
        SUM(op.mira_quick_stripping * p.[first_month]) AS first_total_shots,
        SUM(op.mira_quick_stripping * p.[second_month]) AS second_total_shots,
        SUM(op.mira_quick_stripping * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'quick_stripping_311_manual' AS process,
        SUM(op.quick_stripping_311_manual * p.[first_month]) AS first_total_shots,
        SUM(op.quick_stripping_311_manual * p.[second_month]) AS second_total_shots,
        SUM(op.quick_stripping_311_manual * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'manual_heat_shrink_blower_sumitube' AS process,
        SUM(op.manual_heat_shrink_blower_sumitube * p.[first_month]) AS first_total_shots,
        SUM(op.manual_heat_shrink_blower_sumitube * p.[second_month]) AS second_total_shots,
        SUM(op.manual_heat_shrink_blower_sumitube * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'manual_taping_dispenser_sw' AS process,
        SUM(op.manual_taping_dispenser_sw * p.[first_month]) AS first_total_shots,
        SUM(op.manual_taping_dispenser_sw * p.[second_month]) AS second_total_shots,
        SUM(op.manual_taping_dispenser_sw * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'heat_shrink_joint_crimping_sw' AS process,
        SUM(op.heat_shrink_joint_crimping_sw * p.[first_month]) AS first_total_shots,
        SUM(op.heat_shrink_joint_crimping_sw * p.[second_month]) AS second_total_shots,
        SUM(op.heat_shrink_joint_crimping_sw * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'casting_c373' AS process,
        SUM(op.casting_c373 * p.[first_month]) AS first_total_shots,
        SUM(op.casting_c373 * p.[second_month]) AS second_total_shots,
        SUM(op.casting_c373 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'casting_c377' AS process,
        SUM(op.casting_c377 * p.[first_month]) AS first_total_shots,
        SUM(op.casting_c377 * p.[second_month]) AS second_total_shots,
        SUM(op.casting_c377 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'casting_c371' AS process,
        SUM(op.casting_c371 * p.[first_month]) AS first_total_shots,
        SUM(op.casting_c371 * p.[second_month]) AS second_total_shots,
        SUM(op.casting_c371 * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'manual_heat_shrink_blower_battery' AS process,
        SUM(op.manual_heat_shrink_blower_battery * p.[first_month]) AS first_total_shots,
        SUM(op.manual_heat_shrink_blower_battery * p.[second_month]) AS second_total_shots,
        SUM(op.manual_heat_shrink_blower_battery * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'casting_c373_normal' AS process,
        SUM(op.casting_c373_normal * p.[first_month]) AS first_total_shots,
        SUM(op.casting_c373_normal * p.[second_month]) AS second_total_shots,
        SUM(op.casting_c373_normal * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'casting_c371_normal' AS process,
        SUM(op.casting_c371_normal * p.[first_month]) AS first_total_shots,
        SUM(op.casting_c371_normal * p.[second_month]) AS second_total_shots,
        SUM(op.casting_c371_normal * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'manual_2tons_bending' AS process,
        SUM(op.manual_2tons_bending * p.[first_month]) AS first_total_shots,
        SUM(op.manual_2tons_bending * p.[second_month]) AS second_total_shots,
        SUM(op.manual_2tons_bending * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'manual_5tons_battery' AS process,
        SUM(op.manual_5tons_battery * p.[first_month]) AS first_total_shots,
        SUM(op.manual_5tons_battery * p.[second_month]) AS second_total_shots,
        SUM(op.manual_5tons_battery * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'al_looping' AS process,
        SUM(op.al_looping * p.[first_month]) AS first_total_shots,
        SUM(op.al_looping * p.[second_month]) AS second_total_shots,
        SUM(op.al_looping * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'soldering' AS process,
        SUM(op.soldering * p.[first_month]) AS first_total_shots,
        SUM(op.soldering * p.[second_month]) AS second_total_shots,
        SUM(op.soldering * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'waterproof_agent_injection' AS process,
        SUM(op.waterproof_agent_injection * p.[first_month]) AS first_total_shots,
        SUM(op.waterproof_agent_injection * p.[second_month]) AS second_total_shots,
        SUM(op.waterproof_agent_injection * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'thermosetting' AS process,
        SUM(op.thermosetting * p.[first_month]) AS first_total_shots,
        SUM(op.thermosetting * p.[second_month]) AS second_total_shots,
        SUM(op.thermosetting * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'completion' AS process,
        SUM(op.completion * p.[first_month]) AS first_total_shots,
        SUM(op.completion * p.[second_month]) AS second_total_shots,
        SUM(op.completion * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'picking_looping' AS process,
        SUM(op.picking_looping * p.[first_month]) AS first_total_shots,
        SUM(op.picking_looping * p.[second_month]) AS second_total_shots,
        SUM(op.picking_looping * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'welding_end' AS process,
        SUM(op.welding_end * p.[first_month]) AS first_total_shots,
        SUM(op.welding_end * p.[second_month]) AS second_total_shots,
        SUM(op.welding_end * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'intermediate_welding' AS process,
        SUM(op.intermediate_welding * p.[first_month]) AS first_total_shots,
        SUM(op.intermediate_welding * p.[second_month]) AS second_total_shots,
        SUM(op.intermediate_welding * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'sam_set_a_b' AS process,
        SUM(op.sam_set_a_b * p.[first_month]) AS first_total_shots,
        SUM(op.sam_set_a_b * p.[second_month]) AS second_total_shots,
        SUM(op.sam_set_a_b * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'sam_set_normal' AS process,
        SUM(op.sam_set_normal * p.[first_month]) AS first_total_shots,
        SUM(op.sam_set_normal * p.[second_month]) AS second_total_shots,
        SUM(op.sam_set_normal * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'total_circuit' AS process,
        SUM(op.total_circuit * p.[first_month]) AS first_total_shots,
        SUM(op.total_circuit * p.[second_month]) AS second_total_shots,
        SUM(op.total_circuit * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]
UNION ALL
SELECT 
        op.[car_model],
        'new_airbag' AS process,
        SUM(op.new_airbag * p.[first_month]) AS first_total_shots,
        SUM(op.new_airbag * p.[second_month]) AS second_total_shots,
        SUM(op.new_airbag * p.[third_month]) AS third_total_shots
    FROM 
        [live_mrcs_db].[dbo].[other_process] AS op
    JOIN 
        (SELECT 
             [base_product],
             [first_month],
             [second_month],
             [third_month]
         FROM 
             [live_mrcs_db].[dbo].[plan_2]
         ) AS p ON op.[base_product] = p.[base_product]
    GROUP BY 
        op.[car_model]

)

SELECT *
FROM CombinedResults
ORDER BY [car_model];


 "; 


$result = sqlsrv_query($conn, $query);

$data = [];
if ($result) {
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        $data[] = $row;
    }
} else {
    die(print_r(sqlsrv_errors(), true));
}

echo json_encode($data);
?>
