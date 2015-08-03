use marcials_osfr;

UPDATE osfr_options SET option_value = 
replace(option_value, 'http://localhost/osinfor', 'http://www2.osinfor.gob.pe/osinfor') 
WHERE option_name = 'home' OR option_name = 'siteurl';

UPDATE osfr_posts SET guid = replace(guid, 'http://localhost/osinfor', 'http://www2.osinfor.gob.pe/osinfor');


UPDATE osfr_posts SET post_content = 
replace(post_content, 'http://localhost/osinfor', 'http://www2.osinfor.gob.pe/osinfor');

UPDATE osfr_postmeta SET meta_value = 
replace(meta_value, 'http://localhost/osinfor', 'http://www2.osinfor.gob.pe/osinfor');