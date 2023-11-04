package ku.cs.habaanhainong.entity;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.Id;
import lombok.Data;

import java.util.UUID;
@Data
@Entity
public class User {

    @Id
    private String email;
    private String username;
    private String password;
    private String name;
    private String role;
}

