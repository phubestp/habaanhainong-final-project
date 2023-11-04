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
    private UUID id;

    private String username;
    private String password;

    private Boolean isAdmin;
    private Boolean isBan;

    private String firstname;
    private String lastname;

    @Nullable
    private String phone_no;
    @Nullable
    private String facebook;
    @Nullable
    private String line;
    @Nullable
    private String instagram;
}

