package ku.cs.habaanhainong.entity;

import jakarta.annotation.Nullable;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.Id;
import lombok.Data;
import org.springframework.boot.context.properties.bind.DefaultValue;

import java.util.UUID;

@Data
@Entity
public class Users {

    @Id
    @GeneratedValue
    private long id;

    private String username;
    private String password;

    private String role;
    private String status;

    private String firstname;
    private String lastname;

    private String phone_no;
    private String facebook;
    private String line;
    private String instagram;

}

