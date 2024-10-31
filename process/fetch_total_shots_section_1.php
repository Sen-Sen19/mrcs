<?php

include 'conn.php';


$addedBy = isset($_POST['added_by']) ? $_POST['added_by'] : '';
$numParams = 199;
$params = array_fill(0, $numParams, $addedBy);
$sql = "
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'trd_nwpa_0_13' AS process,
    SUM(f.trd_nwpa_0_13 * p.[first_month]) AS first_total_shots,
    SUM(f.trd_nwpa_0_13 * p.[second_month]) AS second_total_shots,
    SUM(f.trd_nwpa_0_13 * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'trd_nwpa_below_2_0_except_0_13' AS process,
    SUM(f.trd_nwpa_below_2_0_except_0_13 * p.[first_month]) AS first_total_shots,
    SUM(f.trd_nwpa_below_2_0_except_0_13 * p.[second_month]) AS second_total_shots,
    SUM(f.trd_nwpa_below_2_0_except_0_13 * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'trd_nwpa_2_0_3_0' AS process,
    SUM(f.trd_nwpa_2_0_3_0 * p.[first_month]) AS first_total_shots,
    SUM(f.trd_nwpa_2_0_3_0 * p.[second_month]) AS second_total_shots,
    SUM(f.trd_nwpa_2_0_3_0 * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'trd_wpa_0_13' AS process,
    SUM(f.trd_wpa_0_13 * p.[first_month]) AS first_total_shots,
    SUM(f.trd_wpa_0_13 * p.[second_month]) AS second_total_shots,
    SUM(f.trd_wpa_0_13 * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'trd_wpa_below_2_0_except_0_13' AS process,
    SUM(f.trd_wpa_below_2_0_except_0_13 * p.[first_month]) AS first_total_shots,
    SUM(f.trd_wpa_below_2_0_except_0_13 * p.[second_month]) AS second_total_shots,
    SUM(f.trd_wpa_below_2_0_except_0_13 * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'trd_wpa_2_0_3_0' AS process,
    SUM(f.trd_wpa_2_0_3_0 * p.[first_month]) AS first_total_shots,
    SUM(f.trd_wpa_2_0_3_0 * p.[second_month]) AS second_total_shots,
    SUM(f.trd_wpa_2_0_3_0 * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'tr327' AS process,
    SUM(f.tr327 * p.[first_month]) AS first_total_shots,
    SUM(f.tr327 * p.[second_month]) AS second_total_shots,
    SUM(f.tr327 * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'tr328' AS process,
    SUM(f.tr328 * p.[first_month]) AS first_total_shots,
    SUM(f.tr328 * p.[second_month]) AS second_total_shots,
    SUM(f.tr328 * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'trd_aluminum_nwpa_2_0' AS process,
    SUM(f.trd_aluminum_nwpa_2_0 * p.[first_month]) AS first_total_shots,
    SUM(f.trd_aluminum_nwpa_2_0 * p.[second_month]) AS second_total_shots,
    SUM(f.trd_aluminum_nwpa_2_0 * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'trd_aluminum_nwpa_below_2_0' AS process,
    SUM(f.trd_aluminum_nwpa_below_2_0 * p.[first_month]) AS first_total_shots,
    SUM(f.trd_aluminum_nwpa_below_2_0 * p.[second_month]) AS second_total_shots,
    SUM(f.trd_aluminum_nwpa_below_2_0 * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'trd_aluminum_wpa_2_0' AS process,
    SUM(f.trd_aluminum_wpa_2_0 * p.[first_month]) AS first_total_shots,
    SUM(f.trd_aluminum_wpa_2_0 * p.[second_month]) AS second_total_shots,
    SUM(f.trd_aluminum_wpa_2_0 * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'trd_aluminum_wpa_below_2_0' AS process,
    SUM(f.trd_aluminum_wpa_below_2_0 * p.[first_month]) AS first_total_shots,
    SUM(f.trd_aluminum_wpa_below_2_0 * p.[second_month]) AS second_total_shots,
    SUM(f.trd_aluminum_wpa_below_2_0 * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'aluminum_dimension_check_aluminum_terminal_inspection' AS process,
    SUM(f.aluminum_dimension_check_aluminum_terminal_inspection * p.[first_month]) AS first_total_shots,
    SUM(f.aluminum_dimension_check_aluminum_terminal_inspection * p.[second_month]) AS second_total_shots,
    SUM(f.aluminum_dimension_check_aluminum_terminal_inspection * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'aluminum_visual_inspection' AS process,
    SUM(f.aluminum_visual_inspection * p.[first_month]) AS first_total_shots,
    SUM(f.aluminum_visual_inspection * p.[second_month]) AS second_total_shots,
    SUM(f.aluminum_visual_inspection * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'aluminum_coating_uv_ii' AS process,
    SUM(f.aluminum_coating_uv_ii * p.[first_month]) AS first_total_shots,
    SUM(f.aluminum_coating_uv_ii * p.[second_month]) AS second_total_shots,
    SUM(f.aluminum_coating_uv_ii * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'aluminum_image_inspection' AS process,
    SUM(f.aluminum_image_inspection * p.[first_month]) AS first_total_shots,
    SUM(f.aluminum_image_inspection * p.[second_month]) AS second_total_shots,
    SUM(f.aluminum_image_inspection * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'aluminum_uv_iii' AS process,
    SUM(f.aluminum_uv_iii * p.[first_month]) AS first_total_shots,
    SUM(f.aluminum_uv_iii * p.[second_month]) AS second_total_shots,
    SUM(f.aluminum_uv_iii * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'trd_alpha_aluminum_nwpa' AS process,
    SUM(f.trd_alpha_aluminum_nwpa * p.[first_month]) AS first_total_shots,
    SUM(f.trd_alpha_aluminum_nwpa * p.[second_month]) AS second_total_shots,
    SUM(f.trd_alpha_aluminum_nwpa * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'trd_alpha_aluminum_wpa' AS process,
    SUM(f.trd_alpha_aluminum_wpa * p.[first_month]) AS first_total_shots,
    SUM(f.trd_alpha_aluminum_wpa * p.[second_month]) AS second_total_shots,
    SUM(f.trd_alpha_aluminum_wpa * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'aluminum_visual_inspection_for_alpha' AS process,
    SUM(f.aluminum_visual_inspection_for_alpha * p.[first_month]) AS first_total_shots,
    SUM(f.aluminum_visual_inspection_for_alpha * p.[second_month]) AS second_total_shots,
    SUM(f.aluminum_visual_inspection_for_alpha * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'enlarged_terminal_check_for_alpha' AS process,
    SUM(f.enlarged_terminal_check_for_alpha * p.[first_month]) AS first_total_shots,
    SUM(f.enlarged_terminal_check_for_alpha * p.[second_month]) AS second_total_shots,
    SUM(f.enlarged_terminal_check_for_alpha * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'air_water_leak_test' AS process,
    SUM(f.air_water_leak_test * p.[first_month]) AS first_total_shots,
    SUM(f.air_water_leak_test * p.[second_month]) AS second_total_shots,
    SUM(f.air_water_leak_test * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'sam_sub_no_airbag' AS process,
    SUM(f.sam_sub_no_airbag * p.[first_month]) AS first_total_shots,
    SUM(f.sam_sub_no_airbag * p.[second_month]) AS second_total_shots,
    SUM(f.sam_sub_no_airbag * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'sam_sub_no_normal' AS process,
    SUM(f.sam_sub_no_normal * p.[first_month]) AS first_total_shots,
    SUM(f.sam_sub_no_normal * p.[second_month]) AS second_total_shots,
    SUM(f.sam_sub_no_normal * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'jam_auto_crimping_and_twisting' AS process,
    SUM(f.jam_auto_crimping_and_twisting * p.[first_month]) AS first_total_shots,
    SUM(f.jam_auto_crimping_and_twisting * p.[second_month]) AS second_total_shots,
    SUM(f.jam_auto_crimping_and_twisting * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'trd_alpha_aluminum_5_0_above' AS process,
    SUM(f.trd_alpha_aluminum_5_0_above * p.[first_month]) AS first_total_shots,
    SUM(f.trd_alpha_aluminum_5_0_above * p.[second_month]) AS second_total_shots,
    SUM(f.trd_alpha_aluminum_5_0_above * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'point_marking_nsc' AS process,
    SUM(f.point_marking_nsc * p.[first_month]) AS first_total_shots,
    SUM(f.point_marking_nsc * p.[second_month]) AS second_total_shots,
    SUM(f.point_marking_nsc * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'point_marking_sam' AS process,
    SUM(f.point_marking_sam * p.[first_month]) AS first_total_shots,
    SUM(f.point_marking_sam * p.[second_month]) AS second_total_shots,
    SUM(f.point_marking_sam * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'enlarged_terminal_check_aluminum' AS process,
    SUM(f.enlarged_terminal_check_aluminum * p.[first_month]) AS first_total_shots,
    SUM(f.enlarged_terminal_check_aluminum * p.[second_month]) AS second_total_shots,
    SUM(f.enlarged_terminal_check_aluminum * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'nsc_1' AS process,
    SUM(f.nsc_1 * p.[first_month]) AS first_total_shots,
    SUM(f.nsc_1 * p.[second_month]) AS second_total_shots,
    SUM(f.nsc_1 * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'nsc_2' AS process,
    SUM(f.nsc_2 * p.[first_month]) AS first_total_shots,
    SUM(f.nsc_2 * p.[second_month]) AS second_total_shots,
    SUM(f.nsc_2 * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'nsc_3' AS process,
    SUM(f.nsc_3 * p.[first_month]) AS first_total_shots,
    SUM(f.nsc_3 * p.[second_month]) AS second_total_shots,
    SUM(f.nsc_3 * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'nsc_4' AS process,
    SUM(f.nsc_4 * p.[first_month]) AS first_total_shots,
    SUM(f.nsc_4 * p.[second_month]) AS second_total_shots,
    SUM(f.nsc_4 * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'nsc_5' AS process,
    SUM(f.nsc_5 * p.[first_month]) AS first_total_shots,
    SUM(f.nsc_5 * p.[second_month]) AS second_total_shots,
    SUM(f.nsc_5 * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'nsc_6' AS process,
    SUM(f.nsc_6 * p.[first_month]) AS first_total_shots,
    SUM(f.nsc_6 * p.[second_month]) AS second_total_shots,
    SUM(f.nsc_6 * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'nsc_7' AS process,
    SUM(f.nsc_7 * p.[first_month]) AS first_total_shots,
    SUM(f.nsc_7 * p.[second_month]) AS second_total_shots,
    SUM(f.nsc_7 * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'nsc_8' AS process,
    SUM(f.nsc_8 * p.[first_month]) AS first_total_shots,
    SUM(f.nsc_8 * p.[second_month]) AS second_total_shots,
    SUM(f.nsc_8 * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'nsc_9' AS process,
    SUM(f.nsc_9 * p.[first_month]) AS first_total_shots,
    SUM(f.nsc_9 * p.[second_month]) AS second_total_shots,
    SUM(f.nsc_9 * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END AS car_model,
    'nsc_10' AS process,
    SUM(f.nsc_10 * p.[first_month]) AS first_total_shots,
    SUM(f.nsc_10 * p.[second_month]) AS second_total_shots,
    SUM(f.nsc_10 * p.[third_month]) AS third_total_shots
FROM [live_mrcs_db].[dbo].[first_process] f
JOIN [live_mrcs_db].[dbo].[plan_2] p ON f.[base_product] = p.[base_product]
WHERE f.[car_model] = 'suzuki old' AND p.added_by = ?
GROUP BY 
    CASE 
        WHEN f.[car_model] = 'suzuki old' THEN 'Suzuki Old'
        ELSE 'Other' 
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'joint_crimping_20tons_ps_115_2_3l_2' AS process,
    SUM(u.[joint_crimping_20tons_ps_115_2_3l_2]* p.[first_month]) AS first_total_shots,
    SUM(u.[joint_crimping_20tons_ps_115_2_3l_2]* p.[second_month]) AS second_total_shots,
    SUM(u.[joint_crimping_20tons_ps_115_2_3l_2]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'ultrasonic_welding' AS process,
    SUM(u.[ultrasonic_welding]* p.[first_month]) AS first_total_shots,
    SUM(u.[ultrasonic_welding]* p.[second_month]) AS second_total_shots,
    SUM(u.[ultrasonic_welding]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'servo_press_crimping' AS process,
    SUM(u.[servo_press_crimping]* p.[first_month]) AS first_total_shots,
    SUM(u.[servo_press_crimping]* p.[second_month]) AS second_total_shots,
    SUM(u.[servo_press_crimping]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'low_viscosity' AS process,
    SUM(u.[low_viscosity]* p.[first_month]) AS first_total_shots,
    SUM(u.[low_viscosity]* p.[second_month]) AS second_total_shots,
    SUM(u.[low_viscosity]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'air_water_leak_test2' AS process,
    SUM(u.[air_water_leak_test2]* p.[first_month]) AS first_total_shots,
    SUM(u.[air_water_leak_test2]* p.[second_month]) AS second_total_shots,
    SUM(u.[air_water_leak_test2]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'heatshrink_low_viscosity' AS process,
    SUM(u.[heatshrink_low_viscosity]* p.[first_month]) AS first_total_shots,
    SUM(u.[heatshrink_low_viscosity]* p.[second_month]) AS second_total_shots,
    SUM(u.[heatshrink_low_viscosity]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'stmac_shieldwire_j12' AS process,
    SUM(u.[stmac_shieldwire_j12]* p.[first_month]) AS first_total_shots,
    SUM(u.[stmac_shieldwire_j12]* p.[second_month]) AS second_total_shots,
    SUM(u.[stmac_shieldwire_j12]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'hirose_sheath_stripping_927r' AS process,
    SUM(u.[hirose_sheath_stripping_927r]* p.[first_month]) AS first_total_shots,
    SUM(u.[hirose_sheath_stripping_927r]* p.[second_month]) AS second_total_shots,
    SUM(u.[hirose_sheath_stripping_927r]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'hirose_unistrip' AS process,
    SUM(u.[hirose_unistrip]* p.[first_month]) AS first_total_shots,
    SUM(u.[hirose_unistrip]* p.[second_month]) AS second_total_shots,
    SUM(u.[hirose_unistrip]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'hirose_acetate_taping' AS process,
    SUM(u.[hirose_acetate_taping]* p.[first_month]) AS first_total_shots,
    SUM(u.[hirose_acetate_taping]* p.[second_month]) AS second_total_shots,
    SUM(u.[hirose_acetate_taping]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'hirose_manual_crimping_2_tons' AS process,
    SUM(u.[hirose_manual_crimping_2_tons]* p.[first_month]) AS first_total_shots,
    SUM(u.[hirose_manual_crimping_2_tons]* p.[second_month]) AS second_total_shots,
    SUM(u.[hirose_manual_crimping_2_tons]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'hirose_copper_taping' AS process,
    SUM(u.[hirose_copper_taping]* p.[first_month]) AS first_total_shots,
    SUM(u.[hirose_copper_taping]* p.[second_month]) AS second_total_shots,
    SUM(u.[hirose_copper_taping]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'hirose_hgt17ap_crimping' AS process,
    SUM(u.[hirose_hgt17ap_crimping]* p.[first_month]) AS first_total_shots,
    SUM(u.[hirose_hgt17ap_crimping]* p.[second_month]) AS second_total_shots,
    SUM(u.[hirose_hgt17ap_crimping]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'stmac_aluminum' AS process,
    SUM(u.[stmac_aluminum]* p.[first_month]) AS first_total_shots,
    SUM(u.[stmac_aluminum]* p.[second_month]) AS second_total_shots,
    SUM(u.[stmac_aluminum]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_crimping_20tons' AS process,
    SUM(u.[manual_crimping_20tons]* p.[first_month]) AS first_total_shots,
    SUM(u.[manual_crimping_20tons]* p.[second_month]) AS second_total_shots,
    SUM(u.[manual_crimping_20tons]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'dip_soldering_battery' AS process,
    SUM(u.[dip_soldering_battery]* p.[first_month]) AS first_total_shots,
    SUM(u.[dip_soldering_battery]* p.[second_month]) AS second_total_shots,
    SUM(u.[dip_soldering_battery]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'ultrasonic_dip_soldering_aluminum' AS process,
    SUM(u.[ultrasonic_dip_soldering_aluminum]* p.[first_month]) AS first_total_shots,
    SUM(u.[ultrasonic_dip_soldering_aluminum]* p.[second_month]) AS second_total_shots,
    SUM(u.[ultrasonic_dip_soldering_aluminum]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'la_molding' AS process,
    SUM(u.[la_molding]* p.[first_month]) AS first_total_shots,
    SUM(u.[la_molding]* p.[second_month]) AS second_total_shots,
    SUM(u.[la_molding]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'pressure_welding_sun_visor' AS process,
    SUM(u.[pressure_welding_sun_visor]* p.[first_month]) AS first_total_shots,
    SUM(u.[pressure_welding_sun_visor]* p.[second_month]) AS second_total_shots,
    SUM(u.[pressure_welding_sun_visor]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'pressure_welding_dome_lamp' AS process,
    SUM(u.[pressure_welding_dome_lamp]* p.[first_month]) AS first_total_shots,
    SUM(u.[pressure_welding_dome_lamp]* p.[second_month]) AS second_total_shots,
    SUM(u.[pressure_welding_dome_lamp]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'casting_c377a' AS process,
    SUM(u.[casting_c377a]* p.[first_month]) AS first_total_shots,
    SUM(u.[casting_c377a]* p.[second_month]) AS second_total_shots,
    SUM(u.[casting_c377a]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'coaxstrip_6580' AS process,
    SUM(u.[coaxstrip_6580]* p.[first_month]) AS first_total_shots,
    SUM(u.[coaxstrip_6580]* p.[second_month]) AS second_total_shots,
    SUM(u.[coaxstrip_6580]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_crimping_2t_ferrule' AS process,
    SUM(u.[manual_crimping_2t_ferrule]* p.[first_month]) AS first_total_shots,
    SUM(u.[manual_crimping_2t_ferrule]* p.[second_month]) AS second_total_shots,
    SUM(u.[manual_crimping_2t_ferrule]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'ferrule_auto_crimping' AS process,
    SUM(u.[ferrule_auto_crimping]* p.[first_month]) AS first_total_shots,
    SUM(u.[ferrule_auto_crimping]* p.[second_month]) AS second_total_shots,
    SUM(u.[ferrule_auto_crimping]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'enlarge_terminal_inspection' AS process,
    SUM(u.[enlarge_terminal_inspection]* p.[first_month]) AS first_total_shots,
    SUM(u.[enlarge_terminal_inspection]* p.[second_month]) AS second_total_shots,
    SUM(u.[enlarge_terminal_inspection]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'waterproof_pad_press' AS process,
    SUM(u.[waterproof_pad_press]* p.[first_month]) AS first_total_shots,
    SUM(u.[waterproof_pad_press]* p.[second_month]) AS second_total_shots,
    SUM(u.[waterproof_pad_press]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'parts_insertion' AS process,
    SUM(u.[parts_insertion]* p.[first_month]) AS first_total_shots,
    SUM(u.[parts_insertion]* p.[second_month]) AS second_total_shots,
    SUM(u.[parts_insertion]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'braided_wire_folding' AS process,
    SUM(u.[braided_wire_folding]* p.[first_month]) AS first_total_shots,
    SUM(u.[braided_wire_folding]* p.[second_month]) AS second_total_shots,
    SUM(u.[braided_wire_folding]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'outside_ferrule_insertion' AS process,
    SUM(u.[outside_ferrule_insertion]* p.[first_month]) AS first_total_shots,
    SUM(u.[outside_ferrule_insertion]* p.[second_month]) AS second_total_shots,
    SUM(u.[outside_ferrule_insertion]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'joint_crimping_2t' AS process,
    SUM(u.[joint_crimping_2t]* p.[first_month]) AS first_total_shots,
    SUM(u.[joint_crimping_2t]* p.[second_month]) AS second_total_shots,
    SUM(u.[joint_crimping_2t]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'welding_at_head' AS process,
    SUM(u.[welding_at_head]* p.[first_month]) AS first_total_shots,
    SUM(u.[welding_at_head]* p.[second_month]) AS second_total_shots,
    SUM(u.[welding_at_head]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'welding_taping' AS process,
    SUM(u.[welding_taping]* p.[first_month]) AS first_total_shots,
    SUM(u.[welding_taping]* p.[second_month]) AS second_total_shots,
    SUM(u.[welding_taping]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'uv_iii_1' AS process,
    SUM(u.[uv_iii_1]* p.[first_month]) AS first_total_shots,
    SUM(u.[uv_iii_1]* p.[second_month]) AS second_total_shots,
    SUM(u.[uv_iii_1]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'uv_iii_2' AS process,
    SUM(u.[uv_iii_2]* p.[first_month]) AS first_total_shots,
    SUM(u.[uv_iii_2]* p.[second_month]) AS second_total_shots,
    SUM(u.[uv_iii_2]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'uv_iii_4' AS process,
    SUM(u.[uv_iii_4]* p.[first_month]) AS first_total_shots,
    SUM(u.[uv_iii_4]* p.[second_month]) AS second_total_shots,
    SUM(u.[uv_iii_4]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'uv_iii_5' AS process,
    SUM(u.[uv_iii_5]* p.[first_month]) AS first_total_shots,
    SUM(u.[uv_iii_5]* p.[second_month]) AS second_total_shots,
    SUM(u.[uv_iii_5]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'uv_iii_7' AS process,
    SUM(u.[uv_iii_7]* p.[first_month]) AS first_total_shots,
    SUM(u.[uv_iii_7]* p.[second_month]) AS second_total_shots,
    SUM(u.[uv_iii_7]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'uv_iii_8' AS process,
    SUM(u.[uv_iii_8]* p.[first_month]) AS first_total_shots,
    SUM(u.[uv_iii_8]* p.[second_month]) AS second_total_shots,
    SUM(u.[uv_iii_8]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'drainwire_tip' AS process,
    SUM(u.[drainwire_tip]* p.[first_month]) AS first_total_shots,
    SUM(u.[drainwire_tip]* p.[second_month]) AS second_total_shots,
    SUM(u.[drainwire_tip]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'arc_welding' AS process,
    SUM(u.[arc_welding]* p.[first_month]) AS first_total_shots,
    SUM(u.[arc_welding]* p.[second_month]) AS second_total_shots,
    SUM(u.[arc_welding]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'c373a_yamaha' AS process,
    SUM(u.[c373a_yamaha]* p.[first_month]) AS first_total_shots,
    SUM(u.[c373a_yamaha]* p.[second_month]) AS second_total_shots,
    SUM(u.[c373a_yamaha]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'cocripper' AS process,
    SUM(u.[cocripper]* p.[first_month]) AS first_total_shots,
    SUM(u.[cocripper]* p.[second_month]) AS second_total_shots,
    SUM(u.[cocripper]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'quickstripping' AS process,
    SUM(u.[quickstripping]* p.[first_month]) AS first_total_shots,
    SUM(u.[quickstripping]* p.[second_month]) AS second_total_shots,
    SUM(u.[quickstripping]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[unique_process] u
JOIN [live_mrcs_db].[dbo].[plan_2] p ON u.[base_product] = p.[base_product]
WHERE u.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN u.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN u.[block] = 'YV7 Block' THEN 'YV7 Block'
        ELSE 'Suzuki old'  
    END

	UNION ALL
	SELECT 
    CASE 
        WHEN n.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN n.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'airbag_housing' AS process,
    SUM(n.[airbag_housing]* p.[first_month]) AS first_total_shots,
    SUM(n.[airbag_housing]* p.[second_month]) AS second_total_shots,
    SUM(n.[airbag_housing]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[non_machine_process] n
JOIN [live_mrcs_db].[dbo].[plan_2] p ON n.[base_product] = p.[base_product]
WHERE n.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN n.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN n.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN n.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN n.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'cap_insertion' AS process,
    SUM(n.[cap_insertion]* p.[first_month]) AS first_total_shots,
    SUM(n.[cap_insertion]* p.[second_month]) AS second_total_shots,
    SUM(n.[cap_insertion]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[non_machine_process] n
JOIN [live_mrcs_db].[dbo].[plan_2] p ON n.[base_product] = p.[base_product]
WHERE n.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN n.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN n.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN n.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN n.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'shieldwire_taping' AS process,
    SUM(n.[shieldwire_taping]* p.[first_month]) AS first_total_shots,
    SUM(n.[shieldwire_taping]* p.[second_month]) AS second_total_shots,
    SUM(n.[shieldwire_taping]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[non_machine_process] n
JOIN [live_mrcs_db].[dbo].[plan_2] p ON n.[base_product] = p.[base_product]
WHERE n.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN n.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN n.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN n.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN n.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'gomusen_insertion' AS process,
    SUM(n.[gomusen_insertion]* p.[first_month]) AS first_total_shots,
    SUM(n.[gomusen_insertion]* p.[second_month]) AS second_total_shots,
    SUM(n.[gomusen_insertion]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[non_machine_process] n
JOIN [live_mrcs_db].[dbo].[plan_2] p ON n.[base_product] = p.[base_product]
WHERE n.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN n.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN n.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN n.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN n.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'point_marking' AS process,
    SUM(n.[point_marking]* p.[first_month]) AS first_total_shots,
    SUM(n.[point_marking]* p.[second_month]) AS second_total_shots,
    SUM(n.[point_marking]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[non_machine_process] n
JOIN [live_mrcs_db].[dbo].[plan_2] p ON n.[base_product] = p.[base_product]
WHERE n.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN n.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN n.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN n.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN n.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'looping' AS process,
    SUM(n.[looping]* p.[first_month]) AS first_total_shots,
    SUM(n.[looping]* p.[second_month]) AS second_total_shots,
    SUM(n.[looping]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[non_machine_process] n
JOIN [live_mrcs_db].[dbo].[plan_2] p ON n.[base_product] = p.[base_product]
WHERE n.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN n.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN n.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN n.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN n.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'shikakari_handler' AS process,
    SUM(n.[shikakari_handler]* p.[first_month]) AS first_total_shots,
    SUM(n.[shikakari_handler]* p.[second_month]) AS second_total_shots,
    SUM(n.[shikakari_handler]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[non_machine_process] n
JOIN [live_mrcs_db].[dbo].[plan_2] p ON n.[base_product] = p.[base_product]
WHERE n.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN n.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN n.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN n.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN n.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'black_taping' AS process,
    SUM(n.[black_taping]* p.[first_month]) AS first_total_shots,
    SUM(n.[black_taping]* p.[second_month]) AS second_total_shots,
    SUM(n.[black_taping]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[non_machine_process] n
JOIN [live_mrcs_db].[dbo].[plan_2] p ON n.[base_product] = p.[base_product]
WHERE n.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN n.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN n.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN n.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN n.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'components_insertion' AS process,
    SUM(n.[components_insertion]* p.[first_month]) AS first_total_shots,
    SUM(n.[components_insertion]* p.[second_month]) AS second_total_shots,
    SUM(n.[components_insertion]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[non_machine_process] n
JOIN [live_mrcs_db].[dbo].[plan_2] p ON n.[base_product] = p.[base_product]
WHERE n.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN n.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN n.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'joint_crimping_2tons_ps_800_s_2' AS process,
    SUM(s.[joint_crimping_2tons_ps_800_s_2]* p.[first_month]) AS first_total_shots,
    SUM(s.[joint_crimping_2tons_ps_800_s_2]* p.[second_month]) AS second_total_shots,
    SUM(s.[joint_crimping_2tons_ps_800_s_2]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'joint_crimping_2tons_ps_200_m_2' AS process,
    SUM(s.[joint_crimping_2tons_ps_200_m_2]* p.[first_month]) AS first_total_shots,
    SUM(s.[joint_crimping_2tons_ps_200_m_2]* p.[second_month]) AS second_total_shots,
    SUM(s.[joint_crimping_2tons_ps_200_m_2]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'joint_crimping_2tons_ps_017_ss_2' AS process,
    SUM(s.[joint_crimping_2tons_ps_017_ss_2]* p.[first_month]) AS first_total_shots,
    SUM(s.[joint_crimping_2tons_ps_017_ss_2]* p.[second_month]) AS second_total_shots,
    SUM(s.[joint_crimping_2tons_ps_017_ss_2]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'joint_crimping_2tons_ps_126_sst2' AS process,
    SUM(s.[joint_crimping_2tons_ps_126_sst2]* p.[first_month]) AS first_total_shots,
    SUM(s.[joint_crimping_2tons_ps_126_sst2]* p.[second_month]) AS second_total_shots,
    SUM(s.[joint_crimping_2tons_ps_126_sst2]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'joint_crimping_4tons_ps_700_l_2' AS process,
    SUM(s.[joint_crimping_4tons_ps_700_l_2]* p.[first_month]) AS first_total_shots,
    SUM(s.[joint_crimping_4tons_ps_700_l_2]* p.[second_month]) AS second_total_shots,
    SUM(s.[joint_crimping_4tons_ps_700_l_2]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'joint_crimping_5tons_ps_150_ll' AS process,
    SUM(s.[joint_crimping_5tons_ps_150_ll]* p.[first_month]) AS first_total_shots,
    SUM(s.[joint_crimping_5tons_ps_150_ll]* p.[second_month]) AS second_total_shots,
    SUM(s.[joint_crimping_5tons_ps_150_ll]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_crimping_shieldwire_2t' AS process,
    SUM(s.[manual_crimping_shieldwire_2t]* p.[first_month]) AS first_total_shots,
    SUM(s.[manual_crimping_shieldwire_2t]* p.[second_month]) AS second_total_shots,
    SUM(s.[manual_crimping_shieldwire_2t]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_crimping_shieldwire_4t' AS process,
    SUM(s.[manual_crimping_shieldwire_4t]* p.[first_month]) AS first_total_shots,
    SUM(s.[manual_crimping_shieldwire_4t]* p.[second_month]) AS second_total_shots,
    SUM(s.[manual_crimping_shieldwire_4t]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'joint_crimping_2tons_ps_800_s_2_sw' AS process,
    SUM(s.[joint_crimping_2tons_ps_800_s_2_sw]* p.[first_month]) AS first_total_shots,
    SUM(s.[joint_crimping_2tons_ps_800_s_2_sw]* p.[second_month]) AS second_total_shots,
    SUM(s.[joint_crimping_2tons_ps_800_s_2_sw]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'joint_crimping_2tons_ps_126_sst2_sw' AS process,
    SUM(s.[joint_crimping_2tons_ps_126_sst2_sw]* p.[first_month]) AS first_total_shots,
    SUM(s.[joint_crimping_2tons_ps_126_sst2_sw]* p.[second_month]) AS second_total_shots,
    SUM(s.[joint_crimping_2tons_ps_126_sst2_sw]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'joint_crimping_2tons_ps_017_ss_2_sw' AS process,
    SUM(s.[joint_crimping_2tons_ps_017_ss_2_sw]* p.[first_month]) AS first_total_shots,
    SUM(s.[joint_crimping_2tons_ps_017_ss_2_sw]* p.[second_month]) AS second_total_shots,
    SUM(s.[joint_crimping_2tons_ps_017_ss_2_sw]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'twisting_primary_normal_wires_l_less_than_1500mm' AS process,
    SUM(s.[twisting_primary_normal_wires_l_less_than_1500mm]* p.[first_month]) AS first_total_shots,
    SUM(s.[twisting_primary_normal_wires_l_less_than_1500mm]* p.[second_month]) AS second_total_shots,
    SUM(s.[twisting_primary_normal_wires_l_less_than_1500mm]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'twisting_primary_normal_wires_l_less_than_3000mm' AS process,
    SUM(s.[twisting_primary_normal_wires_l_less_than_3000mm]* p.[first_month]) AS first_total_shots,
    SUM(s.[twisting_primary_normal_wires_l_less_than_3000mm]* p.[second_month]) AS second_total_shots,
    SUM(s.[twisting_primary_normal_wires_l_less_than_3000mm]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'twisting_primary_normal_wires_l_less_than_4500mm' AS process,
    SUM(s.[twisting_primary_normal_wires_l_less_than_4500mm]* p.[first_month]) AS first_total_shots,
    SUM(s.[twisting_primary_normal_wires_l_less_than_4500mm]* p.[second_month]) AS second_total_shots,
    SUM(s.[twisting_primary_normal_wires_l_less_than_4500mm]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'twisting_primary_normal_wires_l_less_than_6000mm' AS process,
    SUM(s.[twisting_primary_normal_wires_l_less_than_6000mm]* p.[first_month]) AS first_total_shots,
    SUM(s.[twisting_primary_normal_wires_l_less_than_6000mm]* p.[second_month]) AS second_total_shots,
    SUM(s.[twisting_primary_normal_wires_l_less_than_6000mm]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'twisting_primary_normal_wires_l_less_than_7500mm' AS process,
    SUM(s.[twisting_primary_normal_wires_l_less_than_7500mm]* p.[first_month]) AS first_total_shots,
    SUM(s.[twisting_primary_normal_wires_l_less_than_7500mm]* p.[second_month]) AS second_total_shots,
    SUM(s.[twisting_primary_normal_wires_l_less_than_7500mm]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'twisting_primary_normal_wires_l_less_than_9000mm' AS process,
    SUM(s.[twisting_primary_normal_wires_l_less_than_9000mm]* p.[first_month]) AS first_total_shots,
    SUM(s.[twisting_primary_normal_wires_l_less_than_9000mm]* p.[second_month]) AS second_total_shots,
    SUM(s.[twisting_primary_normal_wires_l_less_than_9000mm]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'twisting_secondary_normal_wires_l_less_than_1500mm' AS process,
    SUM(s.[twisting_secondary_normal_wires_l_less_than_1500mm]* p.[first_month]) AS first_total_shots,
    SUM(s.[twisting_secondary_normal_wires_l_less_than_1500mm]* p.[second_month]) AS second_total_shots,
    SUM(s.[twisting_secondary_normal_wires_l_less_than_1500mm]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'twisting_secondary_normal_wires_l_less_than_3000mm' AS process,
    SUM(s.[twisting_secondary_normal_wires_l_less_than_3000mm]* p.[first_month]) AS first_total_shots,
    SUM(s.[twisting_secondary_normal_wires_l_less_than_3000mm]* p.[second_month]) AS second_total_shots,
    SUM(s.[twisting_secondary_normal_wires_l_less_than_3000mm]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'twisting_secondary_normal_wires_l_less_than_4500mm' AS process,
    SUM(s.[twisting_secondary_normal_wires_l_less_than_4500mm]* p.[first_month]) AS first_total_shots,
    SUM(s.[twisting_secondary_normal_wires_l_less_than_4500mm]* p.[second_month]) AS second_total_shots,
    SUM(s.[twisting_secondary_normal_wires_l_less_than_4500mm]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'twisting_secondary_normal_wires_l_less_than_6000mm' AS process,
    SUM(s.[twisting_secondary_normal_wires_l_less_than_6000mm]* p.[first_month]) AS first_total_shots,
    SUM(s.[twisting_secondary_normal_wires_l_less_than_6000mm]* p.[second_month]) AS second_total_shots,
    SUM(s.[twisting_secondary_normal_wires_l_less_than_6000mm]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'twisting_secondary_normal_wires_l_less_than_7500mm' AS process,
    SUM(s.[twisting_secondary_normal_wires_l_less_than_7500mm]* p.[first_month]) AS first_total_shots,
    SUM(s.[twisting_secondary_normal_wires_l_less_than_7500mm]* p.[second_month]) AS second_total_shots,
    SUM(s.[twisting_secondary_normal_wires_l_less_than_7500mm]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'twisting_secondary_normal_wires_l_less_than_9000mm' AS process,
    SUM(s.[twisting_secondary_normal_wires_l_less_than_9000mm]* p.[first_month]) AS first_total_shots,
    SUM(s.[twisting_secondary_normal_wires_l_less_than_9000mm]* p.[second_month]) AS second_total_shots,
    SUM(s.[twisting_secondary_normal_wires_l_less_than_9000mm]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'twisting_primary_aluminum_wires_l_less_than_1500mm' AS process,
    SUM(s.[twisting_primary_aluminum_wires_l_less_than_1500mm]* p.[first_month]) AS first_total_shots,
    SUM(s.[twisting_primary_aluminum_wires_l_less_than_1500mm]* p.[second_month]) AS second_total_shots,
    SUM(s.[twisting_primary_aluminum_wires_l_less_than_1500mm]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'twisting_primary_aluminum_wires_l_less_than_3000mm' AS process,
    SUM(s.[twisting_primary_aluminum_wires_l_less_than_3000mm]* p.[first_month]) AS first_total_shots,
    SUM(s.[twisting_primary_aluminum_wires_l_less_than_3000mm]* p.[second_month]) AS second_total_shots,
    SUM(s.[twisting_primary_aluminum_wires_l_less_than_3000mm]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'twisting_primary_aluminum_wires_l_less_than_4500mm' AS process,
    SUM(s.[twisting_primary_aluminum_wires_l_less_than_4500mm]* p.[first_month]) AS first_total_shots,
    SUM(s.[twisting_primary_aluminum_wires_l_less_than_4500mm]* p.[second_month]) AS second_total_shots,
    SUM(s.[twisting_primary_aluminum_wires_l_less_than_4500mm]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'twisting_primary_aluminum_wires_l_less_than_6000mm' AS process,
    SUM(s.[twisting_primary_aluminum_wires_l_less_than_6000mm]* p.[first_month]) AS first_total_shots,
    SUM(s.[twisting_primary_aluminum_wires_l_less_than_6000mm]* p.[second_month]) AS second_total_shots,
    SUM(s.[twisting_primary_aluminum_wires_l_less_than_6000mm]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'twisting_secondary_aluminum_wires_l_less_than_1500mm' AS process,
    SUM(s.[twisting_secondary_aluminum_wires_l_less_than_1500mm]* p.[first_month]) AS first_total_shots,
    SUM(s.[twisting_secondary_aluminum_wires_l_less_than_1500mm]* p.[second_month]) AS second_total_shots,
    SUM(s.[twisting_secondary_aluminum_wires_l_less_than_1500mm]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'twisting_secondary_aluminum_wires_l_less_than_3000mm' AS process,
    SUM(s.[twisting_secondary_aluminum_wires_l_less_than_3000mm]* p.[first_month]) AS first_total_shots,
    SUM(s.[twisting_secondary_aluminum_wires_l_less_than_3000mm]* p.[second_month]) AS second_total_shots,
    SUM(s.[twisting_secondary_aluminum_wires_l_less_than_3000mm]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'twisting_secondary_aluminum_wires_l_less_than_4500mm' AS process,
    SUM(s.[twisting_secondary_aluminum_wires_l_less_than_4500mm]* p.[first_month]) AS first_total_shots,
    SUM(s.[twisting_secondary_aluminum_wires_l_less_than_4500mm]* p.[second_month]) AS second_total_shots,
    SUM(s.[twisting_secondary_aluminum_wires_l_less_than_4500mm]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'twisting_secondary_aluminum_wires_l_less_than_6000mm' AS process,
    SUM(s.[twisting_secondary_aluminum_wires_l_less_than_6000mm]* p.[first_month]) AS first_total_shots,
    SUM(s.[twisting_secondary_aluminum_wires_l_less_than_6000mm]* p.[second_month]) AS second_total_shots,
    SUM(s.[twisting_secondary_aluminum_wires_l_less_than_6000mm]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'twisting_secondary_aluminum_wires_l_less_than_7500mm' AS process,
    SUM(s.[twisting_secondary_aluminum_wires_l_less_than_7500mm]* p.[first_month]) AS first_total_shots,
    SUM(s.[twisting_secondary_aluminum_wires_l_less_than_7500mm]* p.[second_month]) AS second_total_shots,
    SUM(s.[twisting_secondary_aluminum_wires_l_less_than_7500mm]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'twisting_secondary_aluminum_wires_l_less_than_9000mm' AS process,
    SUM(s.[twisting_secondary_aluminum_wires_l_less_than_9000mm]* p.[first_month]) AS first_total_shots,
    SUM(s.[twisting_secondary_aluminum_wires_l_less_than_9000mm]* p.[second_month]) AS second_total_shots,
    SUM(s.[twisting_secondary_aluminum_wires_l_less_than_9000mm]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_crimping_2tons_normal_single_crimp' AS process,
    SUM(s.[manual_crimping_2tons_normal_single_crimp]* p.[first_month]) AS first_total_shots,
    SUM(s.[manual_crimping_2tons_normal_single_crimp]* p.[second_month]) AS second_total_shots,
    SUM(s.[manual_crimping_2tons_normal_single_crimp]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_crimping_2tons_normal_double_crimp' AS process,
    SUM(s.[manual_crimping_2tons_normal_double_crimp]* p.[first_month]) AS first_total_shots,
    SUM(s.[manual_crimping_2tons_normal_double_crimp]* p.[second_month]) AS second_total_shots,
    SUM(s.[manual_crimping_2tons_normal_double_crimp]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_crimping_2tons_double_crimp_twisted' AS process,
    SUM(s.[manual_crimping_2tons_double_crimp_twisted]* p.[first_month]) AS first_total_shots,
    SUM(s.[manual_crimping_2tons_double_crimp_twisted]* p.[second_month]) AS second_total_shots,
    SUM(s.[manual_crimping_2tons_double_crimp_twisted]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_crimping_2tons_la_terminal' AS process,
    SUM(s.[manual_crimping_2tons_la_terminal]* p.[first_month]) AS first_total_shots,
    SUM(s.[manual_crimping_2tons_la_terminal]* p.[second_month]) AS second_total_shots,
    SUM(s.[manual_crimping_2tons_la_terminal]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_crimping_2tons_double_crimp_la_terminal' AS process,
    SUM(s.[manual_crimping_2tons_double_crimp_la_terminal]* p.[first_month]) AS first_total_shots,
    SUM(s.[manual_crimping_2tons_double_crimp_la_terminal]* p.[second_month]) AS second_total_shots,
    SUM(s.[manual_crimping_2tons_double_crimp_la_terminal]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_crimping_2tons_w_gomusen' AS process,
    SUM(s.[manual_crimping_2tons_w_gomusen]* p.[first_month]) AS first_total_shots,
    SUM(s.[manual_crimping_2tons_w_gomusen]* p.[second_month]) AS second_total_shots,
    SUM(s.[manual_crimping_2tons_w_gomusen]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_crimping_4tons_double_crimp_twisted' AS process,
    SUM(s.[manual_crimping_4tons_double_crimp_twisted]* p.[first_month]) AS first_total_shots,
    SUM(s.[manual_crimping_4tons_double_crimp_twisted]* p.[second_month]) AS second_total_shots,
    SUM(s.[manual_crimping_4tons_double_crimp_twisted]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_crimping_4tons_normal_single_crimp' AS process,
    SUM(s.[manual_crimping_4tons_normal_single_crimp]* p.[first_month]) AS first_total_shots,
    SUM(s.[manual_crimping_4tons_normal_single_crimp]* p.[second_month]) AS second_total_shots,
    SUM(s.[manual_crimping_4tons_normal_single_crimp]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_crimping_4tons_normal_double_crimp' AS process,
    SUM(s.[manual_crimping_4tons_normal_double_crimp]* p.[first_month]) AS first_total_shots,
    SUM(s.[manual_crimping_4tons_normal_double_crimp]* p.[second_month]) AS second_total_shots,
    SUM(s.[manual_crimping_4tons_normal_double_crimp]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_crimping_4tons_la_terminal' AS process,
    SUM(s.[manual_crimping_4tons_la_terminal]* p.[first_month]) AS first_total_shots,
    SUM(s.[manual_crimping_4tons_la_terminal]* p.[second_month]) AS second_total_shots,
    SUM(s.[manual_crimping_4tons_la_terminal]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_crimping_4tons_double_crimp_la_terminal' AS process,
    SUM(s.[manual_crimping_4tons_double_crimp_la_terminal]* p.[first_month]) AS first_total_shots,
    SUM(s.[manual_crimping_4tons_double_crimp_la_terminal]* p.[second_month]) AS second_total_shots,
    SUM(s.[manual_crimping_4tons_double_crimp_la_terminal]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_crimping_4tons_w_gomusen' AS process,
    SUM(s.[manual_crimping_4tons_w_gomusen]* p.[first_month]) AS first_total_shots,
    SUM(s.[manual_crimping_4tons_w_gomusen]* p.[second_month]) AS second_total_shots,
    SUM(s.[manual_crimping_4tons_w_gomusen]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_crimping_5tons' AS process,
    SUM(s.[manual_crimping_5tons]* p.[first_month]) AS first_total_shots,
    SUM(s.[manual_crimping_5tons]* p.[second_month]) AS second_total_shots,
    SUM(s.[manual_crimping_5tons]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'intermediate_butt_welding_except_0_13_electrode_1' AS process,
    SUM(s.[intermediate_butt_welding_except_0_13_electrode_1]* p.[first_month]) AS first_total_shots,
    SUM(s.[intermediate_butt_welding_except_0_13_electrode_1]* p.[second_month]) AS second_total_shots,
    SUM(s.[intermediate_butt_welding_except_0_13_electrode_1]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'intermediate_butt_welding_except_0_13_electrode_2' AS process,
    SUM(s.[intermediate_butt_welding_except_0_13_electrode_2]* p.[first_month]) AS first_total_shots,
    SUM(s.[intermediate_butt_welding_except_0_13_electrode_2]* p.[second_month]) AS second_total_shots,
    SUM(s.[intermediate_butt_welding_except_0_13_electrode_2]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'intermediate_butt_welding_except_0_13_electrode_3' AS process,
    SUM(s.[intermediate_butt_welding_except_0_13_electrode_3]* p.[first_month]) AS first_total_shots,
    SUM(s.[intermediate_butt_welding_except_0_13_electrode_3]* p.[second_month]) AS second_total_shots,
    SUM(s.[intermediate_butt_welding_except_0_13_electrode_3]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'intermediate_butt_welding_except_0_13_electrode_4' AS process,
    SUM(s.[intermediate_butt_welding_except_0_13_electrode_4]* p.[first_month]) AS first_total_shots,
    SUM(s.[intermediate_butt_welding_except_0_13_electrode_4]* p.[second_month]) AS second_total_shots,
    SUM(s.[intermediate_butt_welding_except_0_13_electrode_4]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'intermediate_butt_welding_except_0_13_electrode_5' AS process,
    SUM(s.[intermediate_butt_welding_except_0_13_electrode_5]* p.[first_month]) AS first_total_shots,
    SUM(s.[intermediate_butt_welding_except_0_13_electrode_5]* p.[second_month]) AS second_total_shots,
    SUM(s.[intermediate_butt_welding_except_0_13_electrode_5]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'welding_at_head_except_0_13_electrode_1' AS process,
    SUM(s.[welding_at_head_except_0_13_electrode_1]* p.[first_month]) AS first_total_shots,
    SUM(s.[welding_at_head_except_0_13_electrode_1]* p.[second_month]) AS second_total_shots,
    SUM(s.[welding_at_head_except_0_13_electrode_1]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'welding_at_head_except_0_13_electrode_2' AS process,
    SUM(s.[welding_at_head_except_0_13_electrode_2]* p.[first_month]) AS first_total_shots,
    SUM(s.[welding_at_head_except_0_13_electrode_2]* p.[second_month]) AS second_total_shots,
    SUM(s.[welding_at_head_except_0_13_electrode_2]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'welding_at_head_except_0_13_electrode_3' AS process,
    SUM(s.[welding_at_head_except_0_13_electrode_3]* p.[first_month]) AS first_total_shots,
    SUM(s.[welding_at_head_except_0_13_electrode_3]* p.[second_month]) AS second_total_shots,
    SUM(s.[welding_at_head_except_0_13_electrode_3]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'welding_at_head_except_0_13_electrode_4' AS process,
    SUM(s.[welding_at_head_except_0_13_electrode_4]* p.[first_month]) AS first_total_shots,
    SUM(s.[welding_at_head_except_0_13_electrode_4]* p.[second_month]) AS second_total_shots,
    SUM(s.[welding_at_head_except_0_13_electrode_4]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'welding_at_head_except_0_13_electrode_5' AS process,
    SUM(s.[welding_at_head_except_0_13_electrode_5]* p.[first_month]) AS first_total_shots,
    SUM(s.[welding_at_head_except_0_13_electrode_5]* p.[second_month]) AS second_total_shots,
    SUM(s.[welding_at_head_except_0_13_electrode_5]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'intermediate_butt_welding_0_13_electrode_1' AS process,
    SUM(s.[intermediate_butt_welding_0_13_electrode_1]* p.[first_month]) AS first_total_shots,
    SUM(s.[intermediate_butt_welding_0_13_electrode_1]* p.[second_month]) AS second_total_shots,
    SUM(s.[intermediate_butt_welding_0_13_electrode_1]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'welding_at_head_0_13_electrode_1' AS process,
    SUM(s.[welding_at_head_0_13_electrode_1]* p.[first_month]) AS first_total_shots,
    SUM(s.[welding_at_head_0_13_electrode_1]* p.[second_month]) AS second_total_shots,
    SUM(s.[welding_at_head_0_13_electrode_1]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'intermediate_butt_welding_0_13_electrode_2' AS process,
    SUM(s.[intermediate_butt_welding_0_13_electrode_2]* p.[first_month]) AS first_total_shots,
    SUM(s.[intermediate_butt_welding_0_13_electrode_2]* p.[second_month]) AS second_total_shots,
    SUM(s.[intermediate_butt_welding_0_13_electrode_2]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'welding_at_head_0_13_electrode_2' AS process,
    SUM(s.[welding_at_head_0_13_electrode_2]* p.[first_month]) AS first_total_shots,
    SUM(s.[welding_at_head_0_13_electrode_2]* p.[second_month]) AS second_total_shots,
    SUM(s.[welding_at_head_0_13_electrode_2]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[secondary_process] s
JOIN [live_mrcs_db].[dbo].[plan_2] p ON s.[base_product] = p.[base_product]
WHERE s.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN s.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN s.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'v_type_twisting' AS process,
    SUM(o.[v_type_twisting]* p.[first_month]) AS first_total_shots,
    SUM(o.[v_type_twisting]* p.[second_month]) AS second_total_shots,
    SUM(o.[v_type_twisting]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_crimping_2tons_to_be_joint_on_sw' AS process,
    SUM(o.[manual_crimping_2tons_to_be_joint_on_sw]* p.[first_month]) AS first_total_shots,
    SUM(o.[manual_crimping_2tons_to_be_joint_on_sw]* p.[second_month]) AS second_total_shots,
    SUM(o.[manual_crimping_2tons_to_be_joint_on_sw]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'airbag' AS process,
    SUM(o.[airbag]* p.[first_month]) AS first_total_shots,
    SUM(o.[airbag]* p.[second_month]) AS second_total_shots,
    SUM(o.[airbag]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'a_b_sub_pc' AS process,
    SUM(o.[a_b_sub_pc]* p.[first_month]) AS first_total_shots,
    SUM(o.[a_b_sub_pc]* p.[second_month]) AS second_total_shots,
    SUM(o.[a_b_sub_pc]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'intermediate_ripping_uas_manual_nf_f' AS process,
    SUM(o.[intermediate_ripping_uas_manual_nf_f]* p.[first_month]) AS first_total_shots,
    SUM(o.[intermediate_ripping_uas_manual_nf_f]* p.[second_month]) AS second_total_shots,
    SUM(o.[intermediate_ripping_uas_manual_nf_f]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_crimping_4tons_nf_f' AS process,
    SUM(o.[manual_crimping_4tons_nf_f]* p.[first_month]) AS first_total_shots,
    SUM(o.[manual_crimping_4tons_nf_f]* p.[second_month]) AS second_total_shots,
    SUM(o.[manual_crimping_4tons_nf_f]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'intermediate_ripping_uas_joint' AS process,
    SUM(o.[intermediate_ripping_uas_joint]* p.[first_month]) AS first_total_shots,
    SUM(o.[intermediate_ripping_uas_joint]* p.[second_month]) AS second_total_shots,
    SUM(o.[intermediate_ripping_uas_joint]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'intermediate_stripping_kb10' AS process,
    SUM(o.[intermediate_stripping_kb10]* p.[first_month]) AS first_total_shots,
    SUM(o.[intermediate_stripping_kb10]* p.[second_month]) AS second_total_shots,
    SUM(o.[intermediate_stripping_kb10]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22' AS process,
    SUM(o.[manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22]* p.[first_month]) AS first_total_shots,
    SUM(o.[manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22]* p.[second_month]) AS second_total_shots,
    SUM(o.[manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'joint_taping_11mm_ps_150_ll_2' AS process,
    SUM(o.[joint_taping_11mm_ps_150_ll_2]* p.[first_month]) AS first_total_shots,
    SUM(o.[joint_taping_11mm_ps_150_ll_2]* p.[second_month]) AS second_total_shots,
    SUM(o.[joint_taping_11mm_ps_150_ll_2]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'joint_taping_12mm_ps_700_l_2_ps_200_m_2' AS process,
    SUM(o.[joint_taping_12mm_ps_700_l_2_ps_200_m_2]* p.[first_month]) AS first_total_shots,
    SUM(o.[joint_taping_12mm_ps_700_l_2_ps_200_m_2]* p.[second_month]) AS second_total_shots,
    SUM(o.[joint_taping_12mm_ps_700_l_2_ps_200_m_2]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2' AS process,
    SUM(o.[joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2]* p.[first_month]) AS first_total_shots,
    SUM(o.[joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2]* p.[second_month]) AS second_total_shots,
    SUM(o.[joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'heat_shrink_joint_crimping' AS process,
    SUM(o.[heat_shrink_joint_crimping]* p.[first_month]) AS first_total_shots,
    SUM(o.[heat_shrink_joint_crimping]* p.[second_month]) AS second_total_shots,
    SUM(o.[heat_shrink_joint_crimping]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'heat_shrink_la_terminal' AS process,
    SUM(o.[heat_shrink_la_terminal]* p.[first_month]) AS first_total_shots,
    SUM(o.[heat_shrink_la_terminal]* p.[second_month]) AS second_total_shots,
    SUM(o.[heat_shrink_la_terminal]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_crimping_2tons_nsc_weld' AS process,
    SUM(o.[manual_crimping_2tons_nsc_weld]* p.[first_month]) AS first_total_shots,
    SUM(o.[manual_crimping_2tons_nsc_weld]* p.[second_month]) AS second_total_shots,
    SUM(o.[manual_crimping_2tons_nsc_weld]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'intermediate_stripping_kb10_nsc_weld' AS process,
    SUM(o.[intermediate_stripping_kb10_nsc_weld]* p.[first_month]) AS first_total_shots,
    SUM(o.[intermediate_stripping_kb10_nsc_weld]* p.[second_month]) AS second_total_shots,
    SUM(o.[intermediate_stripping_kb10_nsc_weld]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'joint_crimping_2tons_ps_017_ss_2_nsc_weld' AS process,
    SUM(o.[joint_crimping_2tons_ps_017_ss_2_nsc_weld]* p.[first_month]) AS first_total_shots,
    SUM(o.[joint_crimping_2tons_ps_017_ss_2_nsc_weld]* p.[second_month]) AS second_total_shots,
    SUM(o.[joint_crimping_2tons_ps_017_ss_2_nsc_weld]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld' AS process,
    SUM(o.[joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld]* p.[first_month]) AS first_total_shots,
    SUM(o.[joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld]* p.[second_month]) AS second_total_shots,
    SUM(o.[joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'silicon_injection' AS process,
    SUM(o.[silicon_injection]* p.[first_month]) AS first_total_shots,
    SUM(o.[silicon_injection]* p.[second_month]) AS second_total_shots,
    SUM(o.[silicon_injection]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'welding_taping_13mm' AS process,
    SUM(o.[welding_taping_13mm]* p.[first_month]) AS first_total_shots,
    SUM(o.[welding_taping_13mm]* p.[second_month]) AS second_total_shots,
    SUM(o.[welding_taping_13mm]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'heat_shrink_welding' AS process,
    SUM(o.[heat_shrink_welding]* p.[first_month]) AS first_total_shots,
    SUM(o.[heat_shrink_welding]* p.[second_month]) AS second_total_shots,
    SUM(o.[heat_shrink_welding]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'casting_c385_shieldwire' AS process,
    SUM(o.[casting_c385_shieldwire]* p.[first_month]) AS first_total_shots,
    SUM(o.[casting_c385_shieldwire]* p.[second_month]) AS second_total_shots,
    SUM(o.[casting_c385_shieldwire]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'quick_stripping_927_auto' AS process,
    SUM(o.[quick_stripping_927_auto]* p.[first_month]) AS first_total_shots,
    SUM(o.[quick_stripping_927_auto]* p.[second_month]) AS second_total_shots,
    SUM(o.[quick_stripping_927_auto]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'mira_quick_stripping' AS process,
    SUM(o.[mira_quick_stripping]* p.[first_month]) AS first_total_shots,
    SUM(o.[mira_quick_stripping]* p.[second_month]) AS second_total_shots,
    SUM(o.[mira_quick_stripping]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'quick_stripping_311_manual' AS process,
    SUM(o.[quick_stripping_311_manual]* p.[first_month]) AS first_total_shots,
    SUM(o.[quick_stripping_311_manual]* p.[second_month]) AS second_total_shots,
    SUM(o.[quick_stripping_311_manual]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_heat_shrink_blower_sumitube' AS process,
    SUM(o.[manual_heat_shrink_blower_sumitube]* p.[first_month]) AS first_total_shots,
    SUM(o.[manual_heat_shrink_blower_sumitube]* p.[second_month]) AS second_total_shots,
    SUM(o.[manual_heat_shrink_blower_sumitube]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_taping_dispenser_sw' AS process,
    SUM(o.[manual_taping_dispenser_sw]* p.[first_month]) AS first_total_shots,
    SUM(o.[manual_taping_dispenser_sw]* p.[second_month]) AS second_total_shots,
    SUM(o.[manual_taping_dispenser_sw]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'heat_shrink_joint_crimping_sw' AS process,
    SUM(o.[heat_shrink_joint_crimping_sw]* p.[first_month]) AS first_total_shots,
    SUM(o.[heat_shrink_joint_crimping_sw]* p.[second_month]) AS second_total_shots,
    SUM(o.[heat_shrink_joint_crimping_sw]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'casting_c373' AS process,
    SUM(o.[casting_c373]* p.[first_month]) AS first_total_shots,
    SUM(o.[casting_c373]* p.[second_month]) AS second_total_shots,
    SUM(o.[casting_c373]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'casting_c377' AS process,
    SUM(o.[casting_c377]* p.[first_month]) AS first_total_shots,
    SUM(o.[casting_c377]* p.[second_month]) AS second_total_shots,
    SUM(o.[casting_c377]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'casting_c371' AS process,
    SUM(o.[casting_c371]* p.[first_month]) AS first_total_shots,
    SUM(o.[casting_c371]* p.[second_month]) AS second_total_shots,
    SUM(o.[casting_c371]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_heat_shrink_blower_battery' AS process,
    SUM(o.[manual_heat_shrink_blower_battery]* p.[first_month]) AS first_total_shots,
    SUM(o.[manual_heat_shrink_blower_battery]* p.[second_month]) AS second_total_shots,
    SUM(o.[manual_heat_shrink_blower_battery]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'casting_c373_normal' AS process,
    SUM(o.[casting_c373_normal]* p.[first_month]) AS first_total_shots,
    SUM(o.[casting_c373_normal]* p.[second_month]) AS second_total_shots,
    SUM(o.[casting_c373_normal]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'casting_c371_normal' AS process,
    SUM(o.[casting_c371_normal]* p.[first_month]) AS first_total_shots,
    SUM(o.[casting_c371_normal]* p.[second_month]) AS second_total_shots,
    SUM(o.[casting_c371_normal]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_2tons_bending' AS process,
    SUM(o.[manual_2tons_bending]* p.[first_month]) AS first_total_shots,
    SUM(o.[manual_2tons_bending]* p.[second_month]) AS second_total_shots,
    SUM(o.[manual_2tons_bending]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'manual_5tons_battery' AS process,
    SUM(o.[manual_5tons_battery]* p.[first_month]) AS first_total_shots,
    SUM(o.[manual_5tons_battery]* p.[second_month]) AS second_total_shots,
    SUM(o.[manual_5tons_battery]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'al_looping' AS process,
    SUM(o.[al_looping]* p.[first_month]) AS first_total_shots,
    SUM(o.[al_looping]* p.[second_month]) AS second_total_shots,
    SUM(o.[al_looping]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'soldering' AS process,
    SUM(o.[soldering]* p.[first_month]) AS first_total_shots,
    SUM(o.[soldering]* p.[second_month]) AS second_total_shots,
    SUM(o.[soldering]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'waterproof_agent_injection' AS process,
    SUM(o.[waterproof_agent_injection]* p.[first_month]) AS first_total_shots,
    SUM(o.[waterproof_agent_injection]* p.[second_month]) AS second_total_shots,
    SUM(o.[waterproof_agent_injection]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'thermosetting' AS process,
    SUM(o.[thermosetting]* p.[first_month]) AS first_total_shots,
    SUM(o.[thermosetting]* p.[second_month]) AS second_total_shots,
    SUM(o.[thermosetting]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'completion' AS process,
    SUM(o.[completion]* p.[first_month]) AS first_total_shots,
    SUM(o.[completion]* p.[second_month]) AS second_total_shots,
    SUM(o.[completion]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'picking_looping' AS process,
    SUM(o.[picking_looping]* p.[first_month]) AS first_total_shots,
    SUM(o.[picking_looping]* p.[second_month]) AS second_total_shots,
    SUM(o.[picking_looping]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'welding_end' AS process,
    SUM(o.[welding_end]* p.[first_month]) AS first_total_shots,
    SUM(o.[welding_end]* p.[second_month]) AS second_total_shots,
    SUM(o.[welding_end]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'intermediate_welding' AS process,
    SUM(o.[intermediate_welding]* p.[first_month]) AS first_total_shots,
    SUM(o.[intermediate_welding]* p.[second_month]) AS second_total_shots,
    SUM(o.[intermediate_welding]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'sam_set_a_b' AS process,
    SUM(o.[sam_set_a_b]* p.[first_month]) AS first_total_shots,
    SUM(o.[sam_set_a_b]* p.[second_month]) AS second_total_shots,
    SUM(o.[sam_set_a_b]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'sam_set_normal' AS process,
    SUM(o.[sam_set_normal]* p.[first_month]) AS first_total_shots,
    SUM(o.[sam_set_normal]* p.[second_month]) AS second_total_shots,
    SUM(o.[sam_set_normal]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'total_circuit' AS process,
    SUM(o.[total_circuit]* p.[first_month]) AS first_total_shots,
    SUM(o.[total_circuit]* p.[second_month]) AS second_total_shots,
    SUM(o.[total_circuit]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END
UNION ALL
SELECT 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END AS car_model,
    'new_airbag' AS process,
    SUM(o.[new_airbag]* p.[first_month]) AS first_total_shots,
    SUM(o.[new_airbag]* p.[second_month]) AS second_total_shots,
    SUM(o.[new_airbag]* p.[third_month]) AS third_total_shots

FROM [live_mrcs_db].[dbo].[other_process] o
JOIN [live_mrcs_db].[dbo].[plan_2] p ON o.[base_product] = p.[base_product]
WHERE o.[car_model] = 'suzuki old'
GROUP BY 
    CASE 
        WHEN o.[block] = 'Y3J Block' THEN 'Y3J Block'
        WHEN o.[block] = 'Yv7 Block' THEN 'Yv7 Block'
        ELSE 'Suzuki old'  
    END

ORDER BY car_model;


";


$result = sqlsrv_query($conn, $sql, $params);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}


$data = [];
while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
    $data[] = $row;
}

// Output data as JSON
header('Content-Type: application/json');
echo json_encode($data);

// Close the connection
sqlsrv_free_stmt($result);
sqlsrv_close($conn);
?>
