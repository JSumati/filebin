 -- Technologies Used: 

            Wamp Server, Php, javascript, jquery, bootstrap, html, css, git
 
 
 -- One can upload only one file (size < 20mb) at once, we can leverage this functionality to support multiple file uploads
 -- After uploading the file, the unique link is generated for each file and shown on the page
 -- The link can be shared to the intended user and as per the requirement, the link can be downloaded only once and file is removed after once downloaded
 

-- How To run filebin:
    1. Install the wamp Server
    2. clone the project in C:\wamp64\www directory
    3. Uncomment "# Include conf/extra/httpd-vhosts.conf" in /wamp64/bin/apache/apache2.4.41/conf/httpd.conf file (just remove the #)
    4. open wamp64/bin/apache/apache2.4.41/conf/extra/httpd-vhosts.conf and write the following:
        # Virtual Hosts
        #
        <VirtualHost *:80>
            ServerName localhost
            ServerAlias localhost
            DocumentRoot "${INSTALL_DIR}/www/"
            <Directory "${INSTALL_DIR}/www/">
                Options +Indexes +Includes +FollowSymLinks +MultiViews
                AllowOverride All
                Require local
            </Directory>
        </VirtualHost>
    
    5. Open C:\Windows\System32\drivers\etc\hosts in notepad and add below lines in first:
        127.0.0.1 localhost
        ::1 localhost
    
    6. Start the wamp server 
    7. Run "localhost/filebin/upload" in the browser
    
