<?php

$fp = fopen('publish.csv','w+');
$sql = "SELECT * FROM webiz_production.node as n JOIN webiz_production.users as u ON u.uid = n.uid JOIN webiz_production.content_type_site as s ON s.vid=n.vid WHERE n.status = 1";
// $sql = "SELECT * FROM webiz_production.node as n JOIN webiz_production.users as u ON u.uid = n.uid JOIN webiz_production.content_type_site as s ON s.vid=n.vid JOIN webiz_production.tmp_op ON n.nid = tmp_op.nid";
/*$sql = "SELECT 
  ctc.field_customer_custom_domain_value as domain,
  gxbo.owner_name as owner_name,
  ctc.field_customer_admin_name_value as admin,
  ctc.field_customer_admin_phone_value as phone,
  ctc.field_customer_admin_email_value as email,
  n.title as bizname,
  ctc.field_customer_bizcat_value as bizcat,
  ctc.field_customer_address_value as address,
  ctc.field_customer_subdistrict_value as subdistrict,
  ctc.field_customer_district_value as district,
  ctc.field_customer_province_value as province,
  ctc.field_customer_zipcode_value as zipcode,
  ctc.field_customer_signup_date_value as signup 
FROM {content_type_customer ctc} join {webiz_crm_gxbo_xml_data as gxbo} ON (ctc.field_customer_webiz_id_value = gxbo.uid)
join {node as n} on (ctc.nid = n.nid) 
WHERE ctc.field_customer_webiz_id_value IN (SELECT uid FROM webiz_production.node WHERE type='site' AND status=1)";*/
//echo '"โดเมน","โดเมน-ชั่วคราว","ชื่อ - นามสกุล","ชื่อ - นามสกุล ผู้ดูแล","เบอร์โทรศัพท์","อีเมล","ชื่อบริษัท","หมวดหมู่ธุรกิจ","เลขที่","แขวง","เขต","จังหวัด","รหัสไปรษณีย์"' ."\n";
$result = db_query($sql);
while($row = db_fetch_array($result)){
  // $x = '"'.$row['domain'].'","'.'"'.$row['webiz_domain'].'","'.$row['owner_name'].'","'.$row['admin'].'","'.$row['phone'].'","'.$row['email'].'","'.$row['bizname'].'","'.$row['bizcat'].'","'.$row['address'].'","'.$row['subdistrict'].'","'.$row['district'].'","'.$row['province'].'","'.$row['zipcode'].'","'.date('Y-m-d H:i:s',$row['signup']).'"' ."\n";
  $x = array('http://'.$row['name'].'.webiz.co.th',$row['field_site_domain_value'],$row['mail']);
  $x = '"'.implode('","',$x).'"';
  // print_r($row);
  // echo $x;
  fputs($fp,$x."\n");
}
fclose($fp);
echo db_affected_rows($result);
