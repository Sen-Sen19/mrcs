<?php

include 'conn.php';









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
ON ts.car_model = s.car_model AND ts.process = s.process " ;



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
ON ts.car_model = s.car_model AND ts.process = s.process ";

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
ON ts.car_model = s.car_model AND ts.process = s.process ";







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
ON ts.car_model = s.car_model AND ts.process = s.process " ;



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
ON ts.car_model = s.car_model AND ts.process = s.process ";

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
ON ts.car_model = s.car_model AND ts.process = s.process ";






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
ON ts.car_model = s.car_model AND ts.process = s.process " ;



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
ON ts.car_model = s.car_model AND ts.process = s.process ";

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
ON ts.car_model = s.car_model AND ts.process = s.process ";








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
ON ts.car_model = s.car_model AND ts.process = s.process " ;



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
ON ts.car_model = s.car_model AND ts.process = s.process ";

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
ON ts.car_model = s.car_model AND ts.process = s.process ";







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
ON ts.car_model = s.car_model AND ts.process = s.process " ;



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
ON ts.car_model = s.car_model AND ts.process = s.process ";

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
ON ts.car_model = s.car_model AND ts.process = s.process ";






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
ON ts.car_model = s.car_model AND ts.process = s.process " ;



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
ON ts.car_model = s.car_model AND ts.process = s.process ";

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
ON ts.car_model = s.car_model AND ts.process = s.process ";






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
ON ts.car_model = s.car_model AND ts.process = s.process " ;



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
ON ts.car_model = s.car_model AND ts.process = s.process ";

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
ON ts.car_model = s.car_model AND ts.process = s.process ";






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
ON ts.car_model = s.car_model AND ts.process = s.process " ;



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
ON ts.car_model = s.car_model AND ts.process = s.process ";

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
ON ts.car_model = s.car_model AND ts.process = s.process ";


$statements = [$sql11, $sql12, $sql13,$sql21, $sql22, $sql23, $sql31, $sql32, $sql33, $sql41, $sql42, $sql43,$sql51, $sql52, $sql53,$sql61, $sql62, $sql63, $sql71, $sql72, $sql73, $sql91, $sql92, $sql93];
$success = true;

foreach ($statements as $index => $sql) {
    $stmt = sqlsrv_query($conn, $sql);
    if ($stmt === false) {
        echo "Error in query execution for SQL #$index: " . print_r(sqlsrv_errors(), true) . "<br>";
        $success = false;
    } else {
        sqlsrv_free_stmt($stmt);
    }
}


sqlsrv_close($conn);

if ($success) {
    echo "The updates were successful";
} else {
    echo "One or more updates failed.";
}
?>