
SELECT DATE_FORMAT(gal.DATE, '%d-%m-%Y') AS Date,
       bu.LOGIN AS User_Login,
       gal.METHOD AS Method_Name,
       COUNT(*) AS Method_Count
FROM google_ads_logs gal
JOIN b_user bu ON gal.USER_ID = bu.ID
GROUP BY DATE, USER_Login, Method_Name;
