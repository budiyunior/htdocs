
package pulsa;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class koneksi {
     private static Connection mysqlConfig;
    public static Connection ConfigDB()throws SQLException{
        try {
            String url="jdbc:mysql://localhost:3306/pulsamrdody"; //url database
            String user="root"; //user database
            String pass=""; //password database
            DriverManager.registerDriver(new com.mysql.jdbc.Driver());
            mysqlConfig=DriverManager.getConnection(url, user, pass);            
        } catch (Exception e) {
            System.err.println("koneksi gagal "+e.getMessage()); //perintah menampilkan error pada koneksi
        }
        return mysqlConfig;
}
}
