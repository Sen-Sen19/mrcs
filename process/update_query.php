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
WHERE s.added_by = ?"; // Condition to check added_by" ;



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
WHERE s.added_by = ?"; // Condition to check added_by";

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
WHERE s.added_by = ?"; // Condition to check added_by";







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
WHERE s.added_by = ?"; // Condition to check added_by" ;



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
WHERE s.added_by = ?"; // Condition to check added_by";

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
WHERE s.added_by = ?"; // Condition to check added_by";








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
WHERE s.added_by = ?"; // Condition to check added_by" ;



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
WHERE s.added_by = ?"; // Condition to check added_by";

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
WHERE s.added_by = ?"; // Condition to check added_by";








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
WHERE s.added_by = ?"; // Condition to check added_by" ;



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
WHERE s.added_by = ?"; // Condition to check added_by";

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
WHERE s.added_by = ?"; // Condition to check added_by";







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
WHERE s.added_by = ?"; // Condition to check added_by" ;



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
WHERE s.added_by = ?"; // Condition to check added_by";

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
WHERE s.added_by = ?"; // Condition to check added_by";






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
WHERE s.added_by = ?"; // Condition to check added_by" ;



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
WHERE s.added_by = ?"; // Condition to check added_by";

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
WHERE s.added_by = ?"; // Condition to check added_by";






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
WHERE s.added_by = ?"; // Condition to check added_by" ;



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
WHERE s.added_by = ?"; // Condition to check added_by";

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
WHERE s.added_by = ?"; // Condition to check added_by";






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
WHERE s.added_by = ?"; // Condition to check added_by" ;



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
WHERE s.added_by = ?"; // Condition to check added_by";

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
WHERE s.added_by = ?"; // Condition to check added_by";


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
