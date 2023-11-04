package ku.cs.habaanhainong.service;

import ku.cs.habaanhainong.entity.Member;
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


    public void createUser(Member user) {
        Member record = new Member();
        record.setName(user.getName());
        record.setUsername(user.getUsername());
        record.setRole("ROLE_USER");


        String hashedPassword = passwordEncoder.encode(user.getPassword());
        record.setPassword(hashedPassword);


        repository.save(record);
    }

    public Member getUser(String username) {
        return repository.findByUsername(username);
    }
}
