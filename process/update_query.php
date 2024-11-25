<?php

include 'conn.php';

// Get the full name from the AJAX request
$full_name = isset($_POST['full_name']) ? $_POST['full_name'] : '';

if (empty($full_name)) {
    echo "Full name is required.";
    exit;
}



$sql11= "UPDATE s
SET 
    s.machine_requirements1 = CASE 
        WHEN (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.first_total_shots, 0) / (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))), 2)
    END,    
    s.mp1 = CASE 
        WHEN (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.first_total_shots, 0) / (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_1] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1)
    FROM [live_mrcs_db].[dbo].[section_1] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_1] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements1 = ( 
    SELECT SUM(s.machine_requirements1) / 4.0
    FROM [live_mrcs_db].[dbo].[section_1] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_1] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1) / 5.0
    FROM [live_mrcs_db].[dbo].[section_1] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_1] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1) / 5.0
    FROM [live_mrcs_db].[dbo].[section_1] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_1] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 



$sql12= "UPDATE s
SET 
    s.machine_requirements2 = CASE 
        WHEN (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.second_total_shots, 0) / (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))), 2)
    END,    
    s.mp2 = CASE 
        WHEN (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.second_total_shots, 0) / (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_1] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2)
    FROM [live_mrcs_db].[dbo].[section_2] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_1] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements2 = ( 
    SELECT SUM(s.machine_requirements2) / 4.0
    FROM [live_mrcs_db].[dbo].[section_2] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_1] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2) / 5.0
    FROM [live_mrcs_db].[dbo].[section_1] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_1] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2) / 5.0
    FROM [live_mrcs_db].[dbo].[section_1] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_1] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 



$sql13= "UPDATE s
SET 
    s.machine_requirements3 = CASE 
        WHEN (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.third_total_shots, 0) / (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))), 2)
    END,    
    s.mp3 = CASE 
        WHEN (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.third_total_shots, 0) / (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_1] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3)
    FROM [live_mrcs_db].[dbo].[section_1] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_1] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements3 = ( 
    SELECT SUM(s.machine_requirements3) / 4.0
    FROM [live_mrcs_db].[dbo].[section_1] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_1] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3) / 5.0
    FROM [live_mrcs_db].[dbo].[section_1] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_1] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3) / 5.0
    FROM [live_mrcs_db].[dbo].[section_1] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_1] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 

$sql11= "UPDATE s
SET 
    s.machine_requirements1 = CASE 
        WHEN (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.first_total_shots, 0) / (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))), 2)
    END,    
    s.mp1 = CASE 
        WHEN (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.first_total_shots, 0) / (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_1] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1)
    FROM [live_mrcs_db].[dbo].[section_1] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_1] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements1 = ( 
    SELECT SUM(s.machine_requirements1) / 4.0
    FROM [live_mrcs_db].[dbo].[section_1] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_1] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1) / 5.0
    FROM [live_mrcs_db].[dbo].[section_1] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_1] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1) / 5.0
    FROM [live_mrcs_db].[dbo].[section_1] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_1] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 



$sql12= "UPDATE s
SET 
    s.machine_requirements2 = CASE 
        WHEN (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.second_total_shots, 0) / (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))), 2)
    END,    
    s.mp2 = CASE 
        WHEN (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.second_total_shots, 0) / (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_1] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2)
    FROM [live_mrcs_db].[dbo].[section_2] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_1] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements2 = ( 
    SELECT SUM(s.machine_requirements2) / 4.0
    FROM [live_mrcs_db].[dbo].[section_2] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_1] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2) / 5.0
    FROM [live_mrcs_db].[dbo].[section_1] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_1] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2) / 5.0
    FROM [live_mrcs_db].[dbo].[section_1] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_1] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 



$sql13= "UPDATE s
SET 
    s.machine_requirements3 = CASE 
        WHEN (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.third_total_shots, 0) / (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))), 2)
    END,    
    s.mp3 = CASE 
        WHEN (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.third_total_shots, 0) / (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_1] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3)
    FROM [live_mrcs_db].[dbo].[section_1] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_1] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements3 = ( 
    SELECT SUM(s.machine_requirements3) / 4.0
    FROM [live_mrcs_db].[dbo].[section_1] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_1] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3) / 5.0
    FROM [live_mrcs_db].[dbo].[section_1] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_1] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3) / 5.0
    FROM [live_mrcs_db].[dbo].[section_1] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_1] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 






$sql21= "UPDATE s
SET 
    s.machine_requirements1 = CASE 
        WHEN (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.first_total_shots, 0) / (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))), 2)
    END,    
    s.mp1 = CASE 
        WHEN (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.first_total_shots, 0) / (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_2] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1)
    FROM [live_mrcs_db].[dbo].[section_2] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_2] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements1 = ( 
    SELECT SUM(s.machine_requirements1) / 4.0
    FROM [live_mrcs_db].[dbo].[section_2] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_2] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1) / 5.0
    FROM [live_mrcs_db].[dbo].[section_2] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_2] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1) / 5.0
    FROM [live_mrcs_db].[dbo].[section_2] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_2] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 



$sql22= "UPDATE s
SET 
    s.machine_requirements2 = CASE 
        WHEN (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.second_total_shots, 0) / (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))), 2)
    END,    
    s.mp2 = CASE 
        WHEN (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.second_total_shots, 0) / (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_2] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2)
    FROM [live_mrcs_db].[dbo].[section_2] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_2] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements2 = ( 
    SELECT SUM(s.machine_requirements2) / 4.0
    FROM [live_mrcs_db].[dbo].[section_2] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_2] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2) / 5.0
    FROM [live_mrcs_db].[dbo].[section_2] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_2] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2) / 5.0
    FROM [live_mrcs_db].[dbo].[section_2] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_2] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 



$sql23= "UPDATE s
SET 
    s.machine_requirements3 = CASE 
        WHEN (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.third_total_shots, 0) / (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))), 2)
    END,    
    s.mp3 = CASE 
        WHEN (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.third_total_shots, 0) / (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_2] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3)
    FROM [live_mrcs_db].[dbo].[section_2] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_2] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements3 = ( 
    SELECT SUM(s.machine_requirements3) / 4.0
    FROM [live_mrcs_db].[dbo].[section_2] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_2] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3) / 5.0
    FROM [live_mrcs_db].[dbo].[section_2] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_2] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3) / 5.0
    FROM [live_mrcs_db].[dbo].[section_2] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_2] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 


$sql31= "UPDATE s
SET 
    s.machine_requirements1 = CASE 
        WHEN (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.first_total_shots, 0) / (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))), 2)
    END,    
    s.mp1 = CASE 
        WHEN (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.first_total_shots, 0) / (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_3] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1)
    FROM [live_mrcs_db].[dbo].[section_3] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_3] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements1 = ( 
    SELECT SUM(s.machine_requirements1) / 4.0
    FROM [live_mrcs_db].[dbo].[section_3] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_3] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1) / 5.0
    FROM [live_mrcs_db].[dbo].[section_3] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_3] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1) / 5.0
    FROM [live_mrcs_db].[dbo].[section_3] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_3] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 



$sql32= "UPDATE s
SET 
    s.machine_requirements2 = CASE 
        WHEN (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.second_total_shots, 0) / (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))), 2)
    END,    
    s.mp2 = CASE 
        WHEN (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.second_total_shots, 0) / (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_3] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2)
    FROM [live_mrcs_db].[dbo].[section_3] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_3] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements2 = ( 
    SELECT SUM(s.machine_requirements2) / 4.0
    FROM [live_mrcs_db].[dbo].[section_3] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_3] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2) / 5.0
    FROM [live_mrcs_db].[dbo].[section_3] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_3] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2) / 5.0
    FROM [live_mrcs_db].[dbo].[section_3] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_3] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 



$sql33= "UPDATE s
SET 
    s.machine_requirements3 = CASE 
        WHEN (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.third_total_shots, 0) / (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))), 2)
    END,    
    s.mp3 = CASE 
        WHEN (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.third_total_shots, 0) / (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_3] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3)
    FROM [live_mrcs_db].[dbo].[section_3] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_3] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements3 = ( 
    SELECT SUM(s.machine_requirements3) / 4.0
    FROM [live_mrcs_db].[dbo].[section_3] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_3] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3) / 5.0
    FROM [live_mrcs_db].[dbo].[section_3] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_3] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3) / 5.0
    FROM [live_mrcs_db].[dbo].[section_3] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_3] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 



$sql41= "UPDATE s
SET 
    s.machine_requirements1 = CASE 
        WHEN (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.first_total_shots, 0) / (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))), 2)
    END,    
    s.mp1 = CASE 
        WHEN (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.first_total_shots, 0) / (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_4] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1)
    FROM [live_mrcs_db].[dbo].[section_4] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_4] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements1 = ( 
    SELECT SUM(s.machine_requirements1) / 4.0
    FROM [live_mrcs_db].[dbo].[section_4] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_4] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1) / 5.0
    FROM [live_mrcs_db].[dbo].[section_4] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_4] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1) / 5.0
    FROM [live_mrcs_db].[dbo].[section_4] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_4] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 



$sql42= "UPDATE s
SET 
    s.machine_requirements2 = CASE 
        WHEN (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.second_total_shots, 0) / (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))), 2)
    END,    
    s.mp2 = CASE 
        WHEN (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.second_total_shots, 0) / (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_4] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2)
    FROM [live_mrcs_db].[dbo].[section_4] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_4] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements2 = ( 
    SELECT SUM(s.machine_requirements2) / 4.0
    FROM [live_mrcs_db].[dbo].[section_4] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_4] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2) / 5.0
    FROM [live_mrcs_db].[dbo].[section_4] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_4] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2) / 5.0
    FROM [live_mrcs_db].[dbo].[section_4] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_4] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 



$sql43= "UPDATE s
SET 
    s.machine_requirements3 = CASE 
        WHEN (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.third_total_shots, 0) / (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))), 2)
    END,    
    s.mp3 = CASE 
        WHEN (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.third_total_shots, 0) / (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_4] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3)
    FROM [live_mrcs_db].[dbo].[section_4] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_4] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements3 = ( 
    SELECT SUM(s.machine_requirements3) / 4.0
    FROM [live_mrcs_db].[dbo].[section_4] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_4] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3) / 5.0
    FROM [live_mrcs_db].[dbo].[section_4] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_4] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3) / 5.0
    FROM [live_mrcs_db].[dbo].[section_4] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_4] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 



$sql51= "UPDATE s
SET 
    s.machine_requirements1 = CASE 
        WHEN (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.first_total_shots, 0) / (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))), 2)
    END,    
    s.mp1 = CASE 
        WHEN (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.first_total_shots, 0) / (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_5] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1)
    FROM [live_mrcs_db].[dbo].[section_5] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_5] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements1 = ( 
    SELECT SUM(s.machine_requirements1) / 4.0
    FROM [live_mrcs_db].[dbo].[section_5] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_5] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1) / 5.0
    FROM [live_mrcs_db].[dbo].[section_5] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_5] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1) / 5.0
    FROM [live_mrcs_db].[dbo].[section_5] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_5] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 



$sql52= "UPDATE s
SET 
    s.machine_requirements2 = CASE 
        WHEN (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.second_total_shots, 0) / (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))), 2)
    END,    
    s.mp2 = CASE 
        WHEN (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.second_total_shots, 0) / (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_5] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2)
    FROM [live_mrcs_db].[dbo].[section_5] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_5] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements2 = ( 
    SELECT SUM(s.machine_requirements2) / 4.0
    FROM [live_mrcs_db].[dbo].[section_5] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_5] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2) / 5.0
    FROM [live_mrcs_db].[dbo].[section_5] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_5] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2) / 5.0
    FROM [live_mrcs_db].[dbo].[section_5] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_5] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 



$sql53= "UPDATE s
SET 
    s.machine_requirements3 = CASE 
        WHEN (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.third_total_shots, 0) / (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))), 2)
    END,    
    s.mp3 = CASE 
        WHEN (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.third_total_shots, 0) / (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_5] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3)
    FROM [live_mrcs_db].[dbo].[section_5] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_5] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements3 = ( 
    SELECT SUM(s.machine_requirements3) / 4.0
    FROM [live_mrcs_db].[dbo].[section_5] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_5] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3) / 5.0
    FROM [live_mrcs_db].[dbo].[section_5] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_5] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3) / 5.0
    FROM [live_mrcs_db].[dbo].[section_5] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_5] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 


$sql61= "UPDATE s
SET 
    s.machine_requirements1 = CASE 
        WHEN (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.first_total_shots, 0) / (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))), 2)
    END,    
    s.mp1 = CASE 
        WHEN (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.first_total_shots, 0) / (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_6] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1)
    FROM [live_mrcs_db].[dbo].[section_6] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_6] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements1 = ( 
    SELECT SUM(s.machine_requirements1) / 4.0
    FROM [live_mrcs_db].[dbo].[section_6] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_6] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1) / 5.0
    FROM [live_mrcs_db].[dbo].[section_6] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_6] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1) / 5.0
    FROM [live_mrcs_db].[dbo].[section_6] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_6] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 



$sql62= "UPDATE s
SET 
    s.machine_requirements2 = CASE 
        WHEN (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.second_total_shots, 0) / (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))), 2)
    END,    
    s.mp2 = CASE 
        WHEN (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.second_total_shots, 0) / (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_6] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2)
    FROM [live_mrcs_db].[dbo].[section_6] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_6] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements2 = ( 
    SELECT SUM(s.machine_requirements2) / 4.0
    FROM [live_mrcs_db].[dbo].[section_6] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_6] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2) / 5.0
    FROM [live_mrcs_db].[dbo].[section_6] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_6] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2) / 5.0
    FROM [live_mrcs_db].[dbo].[section_6] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_6] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 



$sql63= "UPDATE s
SET 
    s.machine_requirements3 = CASE 
        WHEN (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.third_total_shots, 0) / (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))), 2)
    END,    
    s.mp3 = CASE 
        WHEN (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.third_total_shots, 0) / (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_6] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3)
    FROM [live_mrcs_db].[dbo].[section_6] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_6] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements3 = ( 
    SELECT SUM(s.machine_requirements3) / 4.0
    FROM [live_mrcs_db].[dbo].[section_6] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_6] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3) / 5.0
    FROM [live_mrcs_db].[dbo].[section_6] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_6] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3) / 5.0
    FROM [live_mrcs_db].[dbo].[section_6] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_6] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 



$sql71= "UPDATE s
SET 
    s.machine_requirements1 = CASE 
        WHEN (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.first_total_shots, 0) / (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))), 2)
    END,    
    s.mp1 = CASE 
        WHEN (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.first_total_shots, 0) / (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_7] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1)
    FROM [live_mrcs_db].[dbo].[section_7] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_7] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements1 = ( 
    SELECT SUM(s.machine_requirements1) / 4.0
    FROM [live_mrcs_db].[dbo].[section_7] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_7] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1) / 5.0
    FROM [live_mrcs_db].[dbo].[section_7] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_7] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1) / 5.0
    FROM [live_mrcs_db].[dbo].[section_7] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_7] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 



$sql72= "UPDATE s
SET 
    s.machine_requirements2 = CASE 
        WHEN (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.second_total_shots, 0) / (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))), 2)
    END,    
    s.mp2 = CASE 
        WHEN (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.second_total_shots, 0) / (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_7] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2)
    FROM [live_mrcs_db].[dbo].[section_7] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_7] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements2 = ( 
    SELECT SUM(s.machine_requirements2) / 4.0
    FROM [live_mrcs_db].[dbo].[section_7] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_7] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2) / 5.0
    FROM [live_mrcs_db].[dbo].[section_7] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_7] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2) / 5.0
    FROM [live_mrcs_db].[dbo].[section_7] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_7] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 



$sql73= "UPDATE s
SET 
    s.machine_requirements3 = CASE 
        WHEN (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.third_total_shots, 0) / (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))), 2)
    END,    
    s.mp3 = CASE 
        WHEN (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.third_total_shots, 0) / (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_7] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3)
    FROM [live_mrcs_db].[dbo].[section_7] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_7] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements3 = ( 
    SELECT SUM(s.machine_requirements3) / 4.0
    FROM [live_mrcs_db].[dbo].[section_7] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_7] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3) / 5.0
    FROM [live_mrcs_db].[dbo].[section_7] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_7] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3) / 5.0
    FROM [live_mrcs_db].[dbo].[section_7] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_7] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 


$sql91= "UPDATE s
SET 
    s.machine_requirements1 = CASE 
        WHEN (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.first_total_shots, 0) / (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))), 2)
    END,    
    s.mp1 = CASE 
        WHEN (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.first_total_shots, 0) / (ISNULL(s.jph1, 0) * (ISNULL(s.wt1, 0) + ISNULL(s.ot1, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_9] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1)
    FROM [live_mrcs_db].[dbo].[section_9] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_9] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements1 = ( 
    SELECT SUM(s.machine_requirements1) / 4.0
    FROM [live_mrcs_db].[dbo].[section_9] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_9] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1) / 5.0
    FROM [live_mrcs_db].[dbo].[section_9] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_9] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements1 = (
    SELECT SUM(s.machine_requirements1) / 5.0
    FROM [live_mrcs_db].[dbo].[section_9] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_9] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 



$sql92= "UPDATE s
SET 
    s.machine_requirements2 = CASE 
        WHEN (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.second_total_shots, 0) / (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))), 2)
    END,    
    s.mp2 = CASE 
        WHEN (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.second_total_shots, 0) / (ISNULL(s.jph2, 0) * (ISNULL(s.wt2, 0) + ISNULL(s.ot2, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_9] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2)
    FROM [live_mrcs_db].[dbo].[section_9] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_9] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements2 = ( 
    SELECT SUM(s.machine_requirements2) / 4.0
    FROM [live_mrcs_db].[dbo].[section_9] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_9] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2) / 5.0
    FROM [live_mrcs_db].[dbo].[section_9] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_9] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements2 = (
    SELECT SUM(s.machine_requirements2) / 5.0
    FROM [live_mrcs_db].[dbo].[section_9] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_9] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 



$sql93= "UPDATE s
SET 
    s.machine_requirements3 = CASE 
        WHEN (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.third_total_shots, 0) / (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))), 2)
    END,    
    s.mp3 = CASE 
        WHEN (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))) = 0 
        THEN 0
        ELSE ROUND(ISNULL(ts.third_total_shots, 0) / (ISNULL(s.jph3, 0) * (ISNULL(s.wt3, 0) + ISNULL(s.ot3, 0))), 2)
    END
FROM [live_mrcs_db].[dbo].[section_9] s
LEFT JOIN [live_mrcs_db].[dbo].[total_shots] ts
ON ts.car_model = s.car_model AND ts.process = s.process
WHERE s.added_by = ?;

UPDATE qc
SET qc.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3)
    FROM [live_mrcs_db].[dbo].[section_9] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_9] qc
WHERE qc.process = 'qc_inspector';

UPDATE zm
SET zm.machine_requirements3 = ( 
    SELECT SUM(s.machine_requirements3) / 4.0
    FROM [live_mrcs_db].[dbo].[section_9] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa')
)
FROM [live_mrcs_db].[dbo].[section_9] zm
WHERE zm.process = 'zaihai_man';

UPDATE ts
SET ts.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3) / 5.0
    FROM [live_mrcs_db].[dbo].[section_9] s
    WHERE s.process IN ('trd_nwpa_0_13', 'trd_nwpa_below_2_0_except_0_13', 'trd_nwpa_2_0_3_0',
                        'trd_wpa_below_2_0_except_0_13', 'trd_aluminum_nwpa_2_0', 'trd_aluminum_nwpa_below_2_0',
                        'trd_alpha_aluminum_nwpa', 'jam_auto_crimping_and_twisting')
)
FROM [live_mrcs_db].[dbo].[section_9] ts
WHERE ts.process = 'tensile_strength_trd';

UPDATE nsc
SET nsc.machine_requirements3 = (
    SELECT SUM(s.machine_requirements3) / 5.0
    FROM [live_mrcs_db].[dbo].[section_9] s
    WHERE s.process IN ('nsc_1','nsc_2','nsc_1','nsc_3','nsc_4','nsc_5','nsc_6','nsc_7','nsc_8','nsc_9','nsc_10')
)
FROM [live_mrcs_db].[dbo].[section_9] nsc
WHERE nsc.process = 'tensile_strength_nsc'"; 





$statements = [$sql11, $sql12, $sql13,$sql21, $sql22, $sql23, $sql31, $sql32, $sql33, $sql41, $sql42, $sql43,$sql51, $sql52, $sql53,$sql61, $sql62, $sql63, $sql71, $sql72, $sql73, $sql91, $sql92, $sql93];

$success = true;

foreach ($statements as $index => $sql) {
    $params = array($full_name); // Prepare parameters for the query
    $stmt = sqlsrv_query($conn, $sql, $params); // Bind parameters to the query
    if ($stmt === false) {
        echo "Error in query execution for SQL #$index: " . print_r(sqlsrv_errors(), true) . "<br>";
        $success = false;
    } else {
        sqlsrv_free_stmt($stmt);
    }
}

sqlsrv_close($conn);

if ($success) {
    echo "Update successful.";
} else {
    echo "Update failed.";
}
