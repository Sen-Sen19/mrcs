<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'conn.php';

$input = file_get_contents('php://input');
$data = json_decode($input, true);

$response = [
    'success' => false,
    'message' => 'An error occurred.'
];

if (isset($data['data']) && !empty($data['data'])) {
    $rows = $data['data'];
    $errors = [];
    $processedCount = 0;

    $rows = array_filter($rows, function ($row) {
        return array_filter($row);
    });

    foreach ($rows as $row) {
        // Extract and trim values
        $base_product = isset($row[0]) ? trim($row[0]) : '';
        $car_model = isset($row[1]) ? trim($row[1]) : '';
        $product = isset($row[2]) ? trim($row[2]) : '';
        $car_code = isset($row[3]) ? trim($row[3]) : '';
        $block = isset($row[4]) ? trim($row[4]) : '';
        $class = isset($row[5]) ? trim($row[5]) : '';
        $line_no = isset($row[6]) ? trim($row[6]) : '';
        $circuit_qty = isset($row[7]) ? trim($row[7]) : '';
        $joint_crimping_2tons_ps_800_s_2 = isset($row[8]) ? trim($row[8]) : '';
        $joint_crimping_2tons_ps_200_m_2 = isset($row[9]) ? trim($row[9]) : '';
        $joint_crimping_2tons_ps_017_ss_2 = isset($row[10]) ? trim($row[10]) : '';
        $joint_crimping_2tons_ps_126_sst2 = isset($row[11]) ? trim($row[11]) : '';
        $joint_crimping_4tons_ps_700_l_2 = isset($row[12]) ? trim($row[12]) : '';
        $joint_crimping_5tons_ps_150_ll = isset($row[13]) ? trim($row[13]) : '';
        $manual_crimping_shieldwire_2t = isset($row[14]) ? trim($row[14]) : '';
        $manual_crimping_shieldwire_4t = isset($row[15]) ? trim($row[15]) : '';
        $joint_crimping_2tons_ps_800_s_2_sw = isset($row[16]) ? trim($row[16]) : '';
        $joint_crimping_2tons_ps_126_sst2_sw = isset($row[17]) ? trim($row[17]) : '';
        $joint_crimping_2tons_ps_017_ss_2_sw = isset($row[18]) ? trim($row[18]) : '';
        $twisting_primary_normal_wires_l_less_than_1500mm = isset($row[19]) ? trim($row[19]) : '';
        

        $sql = "
        MERGE secondary_process AS target
        USING (VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                       ?, ?, ?, ?, ?, ?, ?, ?, ?, ?))
        AS source (
            base_product, car_model, product, car_code, block, class, line_no, 
            circuit_qty, joint_crimping_2tons_ps_800_s_2, joint_crimping_2tons_ps_200_m_2, 
            joint_crimping_2tons_ps_017_ss_2, joint_crimping_2tons_ps_126_sst2, 
            joint_crimping_4tons_ps_700_l_2, joint_crimping_5tons_ps_150_ll, 
            manual_crimping_shieldwire_2t, manual_crimping_shieldwire_4t, 
            joint_crimping_2tons_ps_800_s_2_sw, joint_crimping_2tons_ps_126_sst2_sw, 
            joint_crimping_2tons_ps_017_ss_2_sw, twisting_primary_normal_wires_l_less_than_1500mm
        )
        ON target.car_model = source.car_model 
           AND target.product = source.product 
           AND target.car_code = source.car_code 
           AND target.block = source.block 
           AND target.class = source.class
        WHEN MATCHED THEN
            UPDATE SET 
                target.base_product = source.base_product,
                target.line_no = source.line_no,
                target.circuit_qty = source.circuit_qty,
                target.joint_crimping_2tons_ps_800_s_2 = source.joint_crimping_2tons_ps_800_s_2,
                target.joint_crimping_2tons_ps_200_m_2 = source.joint_crimping_2tons_ps_200_m_2,
                target.joint_crimping_2tons_ps_017_ss_2 = source.joint_crimping_2tons_ps_017_ss_2,
                target.joint_crimping_2tons_ps_126_sst2 = source.joint_crimping_2tons_ps_126_sst2,
                target.joint_crimping_4tons_ps_700_l_2 = source.joint_crimping_4tons_ps_700_l_2,
                target.joint_crimping_5tons_ps_150_ll = source.joint_crimping_5tons_ps_150_ll,
                target.manual_crimping_shieldwire_2t = source.manual_crimping_shieldwire_2t,
                target.manual_crimping_shieldwire_4t = source.manual_crimping_shieldwire_4t,
                target.joint_crimping_2tons_ps_800_s_2_sw = source.joint_crimping_2tons_ps_800_s_2_sw,
                target.joint_crimping_2tons_ps_126_sst2_sw = source.joint_crimping_2tons_ps_126_sst2_sw,
                target.joint_crimping_2tons_ps_017_ss_2_sw = source.joint_crimping_2tons_ps_017_ss_2_sw,
                target.twisting_primary_normal_wires_l_less_than_1500mm = source.twisting_primary_normal_wires_l_less_than_1500mm
        WHEN NOT MATCHED THEN
            INSERT (base_product, car_model, product, car_code, block, class, line_no, 
                    circuit_qty, joint_crimping_2tons_ps_800_s_2, joint_crimping_2tons_ps_200_m_2, 
                    joint_crimping_2tons_ps_017_ss_2, joint_crimping_2tons_ps_126_sst2, 
                    joint_crimping_4tons_ps_700_l_2, joint_crimping_5tons_ps_150_ll, 
                    manual_crimping_shieldwire_2t, manual_crimping_shieldwire_4t, 
                    joint_crimping_2tons_ps_800_s_2_sw, joint_crimping_2tons_ps_126_sst2_sw, 
                    joint_crimping_2tons_ps_017_ss_2_sw, twisting_primary_normal_wires_l_less_than_1500mm)
            VALUES ( base_product, car_model, product, car_code, block, class, line_no, 
                    circuit_qty, joint_crimping_2tons_ps_800_s_2, joint_crimping_2tons_ps_200_m_2, 
                    joint_crimping_2tons_ps_017_ss_2, joint_crimping_2tons_ps_126_sst2, 
                    joint_crimping_4tons_ps_700_l_2, joint_crimping_5tons_ps_150_ll, 
                    manual_crimping_shieldwire_2t, manual_crimping_shieldwire_4t, 
                    joint_crimping_2tons_ps_800_s_2_sw, joint_crimping_2tons_ps_126_sst2_sw, 
                    joint_crimping_2tons_ps_017_ss_2_sw, twisting_primary_normal_wires_l_less_than_1500mm);
        ";

        $params = [
            $base_product, $car_model, $product, $car_code, $block, $class, $line_no, 
            $circuit_qty, $joint_crimping_2tons_ps_800_s_2, $joint_crimping_2tons_ps_200_m_2, 
            $joint_crimping_2tons_ps_017_ss_2, $joint_crimping_2tons_ps_126_sst2, 
            $joint_crimping_4tons_ps_700_l_2, $joint_crimping_5tons_ps_150_ll, 
            $manual_crimping_shieldwire_2t, $manual_crimping_shieldwire_4t, 
            $joint_crimping_2tons_ps_800_s_2_sw, $joint_crimping_2tons_ps_126_sst2_sw, 
            $joint_crimping_2tons_ps_017_ss_2_sw, $twisting_primary_normal_wires_l_less_than_1500mm
        ];

        $stmt = sqlsrv_query($conn, $sql, $params);
        if ($stmt === false) {
            $errors[] = 'Error executing query: ' . print_r(sqlsrv_errors(), true);
        } else {
            $processedCount++;
        }
    }

    if (empty($errors)) {
        $response = [
            'success' => true,
            'message' => "Successfully processed $processedCount records."
        ];
    } else {
        $response['message'] = implode(' ', $errors);
    }
} else {
    $response['message'] = 'No data received.';
}

header('Content-Type: application/json');
echo json_encode($response);
?>
