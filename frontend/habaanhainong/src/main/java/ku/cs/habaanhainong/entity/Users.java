package ku.cs.habaanhainong.entity;

import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import lombok.Data;

@Data
@Entity
public class Users {

    @Id
    private String username;
    private String email;
    private String password;
    private String firstname;
    private String lastname;
    private Boolean isAdmin;
    private Boolean isBan;
    private String phone_no;
    private String facebook;
    private String instagram;
    private String line;
}

