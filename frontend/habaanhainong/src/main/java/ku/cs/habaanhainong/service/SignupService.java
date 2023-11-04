package ku.cs.habaanhainong.service;

import ku.cs.habaanhainong.entity.Users;
import ku.cs.habaanhainong.repository.MemberRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.stereotype.Service;


@Service
public class SignupService {


    @Autowired
    private MemberRepository repository;


    @Autowired
    private PasswordEncoder passwordEncoder;


    public boolean isUsernameAvailable(String username) {
        return repository.findByUsername(username) == null;
    }

    public void createUser(Users users) {
        Users record = new Users();
        record.setFirstname(users.getFirstname());
        record.setLastname(users.getLastname());
        record.setUsername(users.getUsername());
        record.setEmail(users.getEmail());
        record.setPassword(users.getPassword());
        record.setIsAdmin(false);
        record.setIsBan(false);
        record.setPhone_no(users.getPhone_no());
        record.setFacebook(users.getFacebook());
        record.setInstagram(users.getInstagram());
        record.setLine(users.getLine());

        String hashedPassword = passwordEncoder.encode(users.getPassword());
        record.setPassword(hashedPassword);

        repository.save(record);
    }

    public Users getUser(String username) {
        return repository.findByUsername(username);
    }
}
