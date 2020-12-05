FROM mysql:latest
COPY timetable.sql /tmp/
# CMD /bin/bash -c "/usr/bin/mysqld_safe --skip-grant-tables &" && \
#   sleep 15 && \
#   mysql -u root -pabc -e "CREATE DATABASE timetable" && \
#   mysql -u root -pabc timetable < /tmp/timetable.sql
# CMD --init-file /tmp/timetable.sql
EXPOSE 3306