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
        $twisting_primary_normal_wires_l_less_than_3000mm = isset($row[20]) ? trim($row[20]) : '';
        $twisting_primary_normal_wires_l_less_than_4500mm = isset($row[21]) ? trim($row[21]) : '';
        $twisting_primary_normal_wires_l_less_than_6000mm = isset($row[22]) ? trim($row[22]) : '';
        $twisting_primary_normal_wires_l_less_than_7500mm = isset($row[23]) ? trim($row[23]) : '';
        $twisting_primary_normal_wires_l_less_than_9000mm = isset($row[24]) ? trim($row[24]) : '';
        $twisting_secondary_normal_wires_l_less_than_1500mm = isset($row[25]) ? trim($row[25]) : '';
        $twisting_secondary_normal_wires_l_less_than_3000mm = isset($row[26]) ? trim($row[26]) : '';
        $twisting_secondary_normal_wires_l_less_than_4500mm = isset($row[27]) ? trim($row[27]) : '';
        $twisting_secondary_normal_wires_l_less_than_6000mm = isset($row[28]) ? trim($row[28]) : '';
        $twisting_secondary_normal_wires_l_less_than_7500mm = isset($row[29]) ? trim($row[29]) : '';
        $twisting_secondary_normal_wires_l_less_than_9000mm = isset($row[30]) ? trim($row[30]) : '';
        $twisting_primary_aluminum_wires_l_less_than_1500mm = isset($row[31]) ? trim($row[31]) : '';
        $twisting_primary_aluminum_wires_l_less_than_3000mm = isset($row[32]) ? trim($row[32]) : '';
        $twisting_primary_aluminum_wires_l_less_than_4500mm = isset($row[33]) ? trim($row[33]) : '';
        $twisting_primary_aluminum_wires_l_less_than_6000mm = isset($row[34]) ? trim($row[34]) : '';
        
        $twisting_secondary_aluminum_wires_l_less_than_1500mm  = isset($row[35]) ? trim($row[35]) : '';
        $twisting_secondary_aluminum_wires_l_less_than_3000mm = isset($row[36]) ? trim($row[36]) : '';
        $twisting_secondary_aluminum_wires_l_less_than_4500mm = isset($row[37]) ? trim($row[37]) : '';
        $twisting_secondary_aluminum_wires_l_less_than_6000mm = isset($row[38]) ? trim($row[38]) : '';
        $twisting_secondary_aluminum_wires_l_less_than_7500mm = isset($row[39]) ? trim($row[39]) : '';
        $twisting_secondary_aluminum_wires_l_less_than_9000mm = isset($row[40]) ? trim($row[40]) : '';
        $manual_crimping_2tons_normal_single_crimp = isset($row[41]) ? trim($row[41]) : '';
        $manual_crimping_2tons_normal_double_crimp = isset($row[42]) ? trim($row[42]) : '';
        $manual_crimping_2tons_double_crimp_twisted = isset($row[43]) ? trim($row[43]) : '';
        $manual_crimping_2tons_la_terminal = isset($row[44]) ? trim($row[44]) : '';
        $manual_crimping_2tons_double_crimp_la_terminal = isset($row[45]) ? trim($row[45]) : '';
        $manual_crimping_2tons_w_gomusen = isset($row[46]) ? trim($row[46]) : '';
        $manual_crimping_4tons_double_crimp_twisted = isset($row[47]) ? trim($row[47]) : '';
        $manual_crimping_4tons_normal_single_crimp = isset($row[48]) ? trim($row[48]) : '';
        $manual_crimping_4tons_normal_double_crimp = isset($row[49]) ? trim($row[49]) : '';
        $manual_crimping_4tons_la_terminal = isset($row[50]) ? trim($row[50]) : '';
        $manual_crimping_4tons_double_crimp_la_terminal = isset($row[51]) ? trim($row[51]) : '';
        $manual_crimping_4tons_w_gomusen = isset($row[52]) ? trim($row[52]) : '';
        $manual_crimping_5tons = isset($row[53]) ? trim($row[53]) : '';
        $intermediate_butt_welding_except_0_13_electrode_1 = isset($row[54]) ? trim($row[54]) : '';
        $intermediate_butt_welding_except_0_13_electrode_2 = isset($row[55]) ? trim($row[55]) : '';
        $intermediate_butt_welding_except_0_13_electrode_3 = isset($row[56]) ? trim($row[56]) : '';
        $intermediate_butt_welding_except_0_13_electrode_4 = isset($row[57]) ? trim($row[57]) : '';
        $intermediate_butt_welding_except_0_13_electrode_5 = isset($row[58]) ? trim($row[58]) : '';
        $welding_at_head_except_0_13_electrode_1 = isset($row[59]) ? trim($row[59]) : '';
        $welding_at_head_except_0_13_electrode_2 = isset($row[60]) ? trim($row[60]) : '';
        $welding_at_head_except_0_13_electrode_3 = isset($row[61]) ? trim($row[61]) : '';
        $welding_at_head_except_0_13_electrode_4 = isset($row[62]) ? trim($row[62]) : '';
        $welding_at_head_except_0_13_electrode_5 = isset($row[63]) ? trim($row[63]) : '';
        $intermediate_butt_welding_0_13_electrode_1 = isset($row[64]) ? trim($row[64]) : '';
        $welding_at_head_0_13_electrode_1 = isset($row[65]) ? trim($row[65]) : '';
        $intermediate_butt_welding_0_13_electrode_2 = isset($row[66]) ? trim($row[66]) : '';
        $welding_at_head_0_13_electrode_2 = isset($row[67]) ? trim($row[67]) : '';
        
        

        $sql = "
MERGE secondary_process AS target
USING (VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
               ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
               ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
               ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
               ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
               ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
               ?, ?, ?, ?, ?, ?, ?, ?))
AS source (
    base_product, car_model, product, car_code, block, class, line_no, 
    circuit_qty, joint_crimping_2tons_ps_800_s_2, joint_crimping_2tons_ps_200_m_2, 
    joint_crimping_2tons_ps_017_ss_2, joint_crimping_2tons_ps_126_sst2, 
    joint_crimping_4tons_ps_700_l_2, joint_crimping_5tons_ps_150_ll, 
    manual_crimping_shieldwire_2t, manual_crimping_shieldwire_4t, 
    joint_crimping_2tons_ps_800_s_2_sw, joint_crimping_2tons_ps_126_sst2_sw, 
    joint_crimping_2tons_ps_017_ss_2_sw, twisting_primary_normal_wires_l_less_than_1500mm,
    twisting_primary_normal_wires_l_less_than_3000mm, twisting_primary_normal_wires_l_less_than_4500mm,
    twisting_primary_normal_wires_l_less_than_6000mm, twisting_primary_normal_wires_l_less_than_7500mm,
    twisting_primary_normal_wires_l_less_than_9000mm, twisting_secondary_normal_wires_l_less_than_1500mm,
    twisting_secondary_normal_wires_l_less_than_3000mm, twisting_secondary_normal_wires_l_less_than_4500mm,
    twisting_secondary_normal_wires_l_less_than_6000mm, twisting_secondary_normal_wires_l_less_than_7500mm,
    twisting_secondary_normal_wires_l_less_than_9000mm, twisting_primary_aluminum_wires_l_less_than_1500mm,
    twisting_primary_aluminum_wires_l_less_than_3000mm, twisting_primary_aluminum_wires_l_less_than_4500mm,
    twisting_primary_aluminum_wires_l_less_than_6000mm, twisting_secondary_aluminum_wires_l_less_than_1500mm,
twisting_secondary_aluminum_wires_l_less_than_3000mm,
twisting_secondary_aluminum_wires_l_less_than_4500mm,
twisting_secondary_aluminum_wires_l_less_than_6000mm,
twisting_secondary_aluminum_wires_l_less_than_7500mm,
twisting_secondary_aluminum_wires_l_less_than_9000mm,
manual_crimping_2tons_normal_single_crimp,
manual_crimping_2tons_normal_double_crimp,
manual_crimping_2tons_double_crimp_twisted,
manual_crimping_2tons_la_terminal,
manual_crimping_2tons_double_crimp_la_terminal,
manual_crimping_2tons_w_gomusen,
manual_crimping_4tons_double_crimp_twisted,
manual_crimping_4tons_normal_single_crimp,
manual_crimping_4tons_normal_double_crimp,
manual_crimping_4tons_la_terminal,
manual_crimping_4tons_double_crimp_la_terminal,
manual_crimping_4tons_w_gomusen,
manual_crimping_5tons,
intermediate_butt_welding_except_0_13_electrode_1,
intermediate_butt_welding_except_0_13_electrode_2,
intermediate_butt_welding_except_0_13_electrode_3,
intermediate_butt_welding_except_0_13_electrode_4,
intermediate_butt_welding_except_0_13_electrode_5,
welding_at_head_except_0_13_electrode_1,
welding_at_head_except_0_13_electrode_2,
welding_at_head_except_0_13_electrode_3,
welding_at_head_except_0_13_electrode_4,
welding_at_head_except_0_13_electrode_5,
intermediate_butt_welding_0_13_electrode_1,
welding_at_head_0_13_electrode_1,
intermediate_butt_welding_0_13_electrode_2,
welding_at_head_0_13_electrode_2
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
        target.twisting_primary_normal_wires_l_less_than_1500mm = source.twisting_primary_normal_wires_l_less_than_1500mm,
        target.twisting_primary_normal_wires_l_less_than_3000mm = source.twisting_primary_normal_wires_l_less_than_3000mm,
        target.twisting_primary_normal_wires_l_less_than_4500mm = source.twisting_primary_normal_wires_l_less_than_4500mm,
        target.twisting_primary_normal_wires_l_less_than_6000mm = source.twisting_primary_normal_wires_l_less_than_6000mm,
        target.twisting_primary_normal_wires_l_less_than_7500mm = source.twisting_primary_normal_wires_l_less_than_7500mm,
        target.twisting_primary_normal_wires_l_less_than_9000mm = source.twisting_primary_normal_wires_l_less_than_9000mm,

        target.twisting_secondary_normal_wires_l_less_than_1500mm = source.twisting_secondary_normal_wires_l_less_than_1500mm,
        target.twisting_secondary_normal_wires_l_less_than_3000mm = source.twisting_secondary_normal_wires_l_less_than_3000mm,
        target.twisting_secondary_normal_wires_l_less_than_4500mm = source.twisting_secondary_normal_wires_l_less_than_4500mm,
        target.twisting_secondary_normal_wires_l_less_than_6000mm = source.twisting_secondary_normal_wires_l_less_than_6000mm,
        target.twisting_secondary_normal_wires_l_less_than_7500mm = source.twisting_secondary_normal_wires_l_less_than_7500mm,
        target.twisting_secondary_normal_wires_l_less_than_9000mm = source.twisting_secondary_normal_wires_l_less_than_9000mm,
        target.twisting_primary_aluminum_wires_l_less_than_1500mm = source.twisting_primary_aluminum_wires_l_less_than_1500mm,
        target.twisting_primary_aluminum_wires_l_less_than_3000mm = source.twisting_primary_aluminum_wires_l_less_than_3000mm,
        target.twisting_primary_aluminum_wires_l_less_than_4500mm = source.twisting_primary_aluminum_wires_l_less_than_4500mm,
        target.twisting_primary_aluminum_wires_l_less_than_6000mm = source.twisting_primary_aluminum_wires_l_less_than_6000mm,

        target.twisting_secondary_aluminum_wires_l_less_than_1500mm = source.twisting_secondary_aluminum_wires_l_less_than_1500mm,
target.twisting_secondary_aluminum_wires_l_less_than_3000mm = source.twisting_secondary_aluminum_wires_l_less_than_3000mm,
target.twisting_secondary_aluminum_wires_l_less_than_4500mm = source.twisting_secondary_aluminum_wires_l_less_than_4500mm,
target.twisting_secondary_aluminum_wires_l_less_than_6000mm = source.twisting_secondary_aluminum_wires_l_less_than_6000mm,
target.twisting_secondary_aluminum_wires_l_less_than_7500mm = source.twisting_secondary_aluminum_wires_l_less_than_7500mm,
target.twisting_secondary_aluminum_wires_l_less_than_9000mm = source.twisting_secondary_aluminum_wires_l_less_than_9000mm,
target.manual_crimping_2tons_normal_single_crimp = source.manual_crimping_2tons_normal_single_crimp,
target.manual_crimping_2tons_normal_double_crimp = source.manual_crimping_2tons_normal_double_crimp,
target.manual_crimping_2tons_double_crimp_twisted = source.manual_crimping_2tons_double_crimp_twisted,
target.manual_crimping_2tons_la_terminal = source.manual_crimping_2tons_la_terminal,
target.manual_crimping_2tons_double_crimp_la_terminal = source.manual_crimping_2tons_double_crimp_la_terminal,
target.manual_crimping_2tons_w_gomusen = source.manual_crimping_2tons_w_gomusen,
target.manual_crimping_4tons_double_crimp_twisted = source.manual_crimping_4tons_double_crimp_twisted,
target.manual_crimping_4tons_normal_single_crimp = source.manual_crimping_4tons_normal_single_crimp,
target.manual_crimping_4tons_normal_double_crimp = source.manual_crimping_4tons_normal_double_crimp,
target.manual_crimping_4tons_la_terminal = source.manual_crimping_4tons_la_terminal,
target.manual_crimping_4tons_double_crimp_la_terminal = source.manual_crimping_4tons_double_crimp_la_terminal,
target.manual_crimping_4tons_w_gomusen = source.manual_crimping_4tons_w_gomusen,
target.manual_crimping_5tons = source.manual_crimping_5tons,
target.intermediate_butt_welding_except_0_13_electrode_1 = source.intermediate_butt_welding_except_0_13_electrode_1,
target.intermediate_butt_welding_except_0_13_electrode_2 = source.intermediate_butt_welding_except_0_13_electrode_2,
target.intermediate_butt_welding_except_0_13_electrode_3 = source.intermediate_butt_welding_except_0_13_electrode_3,
target.intermediate_butt_welding_except_0_13_electrode_4 = source.intermediate_butt_welding_except_0_13_electrode_4,
target.intermediate_butt_welding_except_0_13_electrode_5 = source.intermediate_butt_welding_except_0_13_electrode_5,
target.welding_at_head_except_0_13_electrode_1 = source.welding_at_head_except_0_13_electrode_1,
target.welding_at_head_except_0_13_electrode_2 = source.welding_at_head_except_0_13_electrode_2,
target.welding_at_head_except_0_13_electrode_3 = source.welding_at_head_except_0_13_electrode_3,
target.welding_at_head_except_0_13_electrode_4 = source.welding_at_head_except_0_13_electrode_4,
target.welding_at_head_except_0_13_electrode_5 = source.welding_at_head_except_0_13_electrode_5,
target.intermediate_butt_welding_0_13_electrode_1 = source.intermediate_butt_welding_0_13_electrode_1,
target.welding_at_head_0_13_electrode_1 = source.welding_at_head_0_13_electrode_1,
target.intermediate_butt_welding_0_13_electrode_2 = source.intermediate_butt_welding_0_13_electrode_2,
target.welding_at_head_0_13_electrode_2 = source.welding_at_head_0_13_electrode_2

         

WHEN NOT MATCHED THEN
    INSERT (base_product, car_model, product, car_code, block, class, line_no, 
            circuit_qty, joint_crimping_2tons_ps_800_s_2, joint_crimping_2tons_ps_200_m_2, 
            joint_crimping_2tons_ps_017_ss_2, joint_crimping_2tons_ps_126_sst2, 
            joint_crimping_4tons_ps_700_l_2, joint_crimping_5tons_ps_150_ll, 
            manual_crimping_shieldwire_2t, manual_crimping_shieldwire_4t, 
            joint_crimping_2tons_ps_800_s_2_sw, joint_crimping_2tons_ps_126_sst2_sw, 
            joint_crimping_2tons_ps_017_ss_2_sw, twisting_primary_normal_wires_l_less_than_1500mm,
            twisting_primary_normal_wires_l_less_than_3000mm, twisting_primary_normal_wires_l_less_than_4500mm,
            twisting_primary_normal_wires_l_less_than_6000mm, twisting_primary_normal_wires_l_less_than_7500mm,
            twisting_primary_normal_wires_l_less_than_9000mm,twisting_secondary_normal_wires_l_less_than_1500mm,
    twisting_secondary_normal_wires_l_less_than_3000mm, twisting_secondary_normal_wires_l_less_than_4500mm,
    twisting_secondary_normal_wires_l_less_than_6000mm, twisting_secondary_normal_wires_l_less_than_7500mm,
    twisting_secondary_normal_wires_l_less_than_9000mm, twisting_primary_aluminum_wires_l_less_than_1500mm,
    twisting_primary_aluminum_wires_l_less_than_3000mm, twisting_primary_aluminum_wires_l_less_than_4500mm,
    twisting_primary_aluminum_wires_l_less_than_6000mm,
    twisting_secondary_aluminum_wires_l_less_than_1500mm,
twisting_secondary_aluminum_wires_l_less_than_3000mm,
twisting_secondary_aluminum_wires_l_less_than_4500mm,
twisting_secondary_aluminum_wires_l_less_than_6000mm,
twisting_secondary_aluminum_wires_l_less_than_7500mm,
twisting_secondary_aluminum_wires_l_less_than_9000mm,
manual_crimping_2tons_normal_single_crimp,
manual_crimping_2tons_normal_double_crimp,
manual_crimping_2tons_double_crimp_twisted,
manual_crimping_2tons_la_terminal,
manual_crimping_2tons_double_crimp_la_terminal,
manual_crimping_2tons_w_gomusen,
manual_crimping_4tons_double_crimp_twisted,
manual_crimping_4tons_normal_single_crimp,
manual_crimping_4tons_normal_double_crimp,
manual_crimping_4tons_la_terminal,
manual_crimping_4tons_double_crimp_la_terminal,
manual_crimping_4tons_w_gomusen,
manual_crimping_5tons,
intermediate_butt_welding_except_0_13_electrode_1,
intermediate_butt_welding_except_0_13_electrode_2,
intermediate_butt_welding_except_0_13_electrode_3,
intermediate_butt_welding_except_0_13_electrode_4,
intermediate_butt_welding_except_0_13_electrode_5,
welding_at_head_except_0_13_electrode_1,
welding_at_head_except_0_13_electrode_2,
welding_at_head_except_0_13_electrode_3,
welding_at_head_except_0_13_electrode_4,
welding_at_head_except_0_13_electrode_5,
intermediate_butt_welding_0_13_electrode_1,
welding_at_head_0_13_electrode_1,
intermediate_butt_welding_0_13_electrode_2,
welding_at_head_0_13_electrode_2
)





    VALUES (base_product, car_model, product, car_code, block, class, line_no, 
            circuit_qty, joint_crimping_2tons_ps_800_s_2, joint_crimping_2tons_ps_200_m_2, 
            joint_crimping_2tons_ps_017_ss_2, joint_crimping_2tons_ps_126_sst2, 
            joint_crimping_4tons_ps_700_l_2, joint_crimping_5tons_ps_150_ll, 
            manual_crimping_shieldwire_2t, manual_crimping_shieldwire_4t, 
            joint_crimping_2tons_ps_800_s_2_sw, joint_crimping_2tons_ps_126_sst2_sw, 
            joint_crimping_2tons_ps_017_ss_2_sw, twisting_primary_normal_wires_l_less_than_1500mm,
            twisting_primary_normal_wires_l_less_than_3000mm, twisting_primary_normal_wires_l_less_than_4500mm,
            twisting_primary_normal_wires_l_less_than_6000mm, twisting_primary_normal_wires_l_less_than_7500mm,
            twisting_primary_normal_wires_l_less_than_9000mm,twisting_secondary_normal_wires_l_less_than_1500mm,
    twisting_secondary_normal_wires_l_less_than_3000mm, twisting_secondary_normal_wires_l_less_than_4500mm,
    twisting_secondary_normal_wires_l_less_than_6000mm, twisting_secondary_normal_wires_l_less_than_7500mm,
    twisting_secondary_normal_wires_l_less_than_9000mm, twisting_primary_aluminum_wires_l_less_than_1500mm,
    twisting_primary_aluminum_wires_l_less_than_3000mm, twisting_primary_aluminum_wires_l_less_than_4500mm,
    twisting_primary_aluminum_wires_l_less_than_6000mm,
    twisting_secondary_aluminum_wires_l_less_than_1500mm,
twisting_secondary_aluminum_wires_l_less_than_3000mm,
twisting_secondary_aluminum_wires_l_less_than_4500mm,
twisting_secondary_aluminum_wires_l_less_than_6000mm,
twisting_secondary_aluminum_wires_l_less_than_7500mm,
twisting_secondary_aluminum_wires_l_less_than_9000mm,
manual_crimping_2tons_normal_single_crimp,
manual_crimping_2tons_normal_double_crimp,
manual_crimping_2tons_double_crimp_twisted,
manual_crimping_2tons_la_terminal,
manual_crimping_2tons_double_crimp_la_terminal,
manual_crimping_2tons_w_gomusen,
manual_crimping_4tons_double_crimp_twisted,
manual_crimping_4tons_normal_single_crimp,
manual_crimping_4tons_normal_double_crimp,
manual_crimping_4tons_la_terminal,
manual_crimping_4tons_double_crimp_la_terminal,
manual_crimping_4tons_w_gomusen,
manual_crimping_5tons,
intermediate_butt_welding_except_0_13_electrode_1,
intermediate_butt_welding_except_0_13_electrode_2,
intermediate_butt_welding_except_0_13_electrode_3,
intermediate_butt_welding_except_0_13_electrode_4,
intermediate_butt_welding_except_0_13_electrode_5,
welding_at_head_except_0_13_electrode_1,
welding_at_head_except_0_13_electrode_2,
welding_at_head_except_0_13_electrode_3,
welding_at_head_except_0_13_electrode_4,
welding_at_head_except_0_13_electrode_5,
intermediate_butt_welding_0_13_electrode_1,
welding_at_head_0_13_electrode_1,
intermediate_butt_welding_0_13_electrode_2,
welding_at_head_0_13_electrode_2);
";

$params = [
    $base_product, $car_model, $product, $car_code, $block, $class, $line_no, 
    $circuit_qty, $joint_crimping_2tons_ps_800_s_2, $joint_crimping_2tons_ps_200_m_2, 
    $joint_crimping_2tons_ps_017_ss_2, $joint_crimping_2tons_ps_126_sst2, 
    $joint_crimping_4tons_ps_700_l_2, $joint_crimping_5tons_ps_150_ll, 
    $manual_crimping_shieldwire_2t, $manual_crimping_shieldwire_4t, 
    $joint_crimping_2tons_ps_800_s_2_sw, $joint_crimping_2tons_ps_126_sst2_sw, 
    $joint_crimping_2tons_ps_017_ss_2_sw, $twisting_primary_normal_wires_l_less_than_1500mm,
    $twisting_primary_normal_wires_l_less_than_3000mm, $twisting_primary_normal_wires_l_less_than_4500mm,
    $twisting_primary_normal_wires_l_less_than_6000mm, $twisting_primary_normal_wires_l_less_than_7500mm,
    $twisting_primary_normal_wires_l_less_than_9000mm,
    $twisting_secondary_normal_wires_l_less_than_1500mm,
    $twisting_secondary_normal_wires_l_less_than_3000mm, $twisting_secondary_normal_wires_l_less_than_4500mm,
    $twisting_secondary_normal_wires_l_less_than_6000mm, $twisting_secondary_normal_wires_l_less_than_7500mm,
    $twisting_secondary_normal_wires_l_less_than_9000mm, $twisting_primary_aluminum_wires_l_less_than_1500mm,
    $twisting_primary_aluminum_wires_l_less_than_3000mm, $twisting_primary_aluminum_wires_l_less_than_4500mm,
    $twisting_primary_aluminum_wires_l_less_than_6000mm,
    $twisting_secondary_aluminum_wires_l_less_than_1500mm,
    $twisting_secondary_aluminum_wires_l_less_than_3000mm,
    $twisting_secondary_aluminum_wires_l_less_than_4500mm,
    $twisting_secondary_aluminum_wires_l_less_than_6000mm,
    $twisting_secondary_aluminum_wires_l_less_than_7500mm,
    $twisting_secondary_aluminum_wires_l_less_than_9000mm,
    $manual_crimping_2tons_normal_single_crimp,
    $manual_crimping_2tons_normal_double_crimp,
    $manual_crimping_2tons_double_crimp_twisted,
    $manual_crimping_2tons_la_terminal,
    $manual_crimping_2tons_double_crimp_la_terminal,
    $manual_crimping_2tons_w_gomusen,
    $manual_crimping_4tons_double_crimp_twisted,
    $manual_crimping_4tons_normal_single_crimp,
    $manual_crimping_4tons_normal_double_crimp,
    $manual_crimping_4tons_la_terminal,
    $manual_crimping_4tons_double_crimp_la_terminal,
    $manual_crimping_4tons_w_gomusen,
    $manual_crimping_5tons,
    $intermediate_butt_welding_except_0_13_electrode_1,
    $intermediate_butt_welding_except_0_13_electrode_2,
    $intermediate_butt_welding_except_0_13_electrode_3,
    $intermediate_butt_welding_except_0_13_electrode_4,
    $intermediate_butt_welding_except_0_13_electrode_5,
    $welding_at_head_except_0_13_electrode_1,
    $welding_at_head_except_0_13_electrode_2,
    $welding_at_head_except_0_13_electrode_3,
    $welding_at_head_except_0_13_electrode_4,
    $welding_at_head_except_0_13_electrode_5,
    $intermediate_butt_welding_0_13_electrode_1,
    $welding_at_head_0_13_electrode_1,
    $intermediate_butt_welding_0_13_electrode_2,
    $welding_at_head_0_13_electrode_2
    
    
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
