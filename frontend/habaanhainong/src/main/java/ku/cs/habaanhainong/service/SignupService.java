package ku.cs.habaanhainong.service;

import ku.cs.habaanhainong.entity.Users;
import ku.cs.habaanhainong.repository.MemberRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpEntity;
import org.springframework.http.HttpHeaders;
import org.springframework.http.HttpMethod;
import org.springframework.http.MediaType;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.stereotype.Service;
import org.springframework.web.client.RestTemplate;
import org.json.JSONObject;

import java.util.HashMap;


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
        record.setUsername(users.getUsername());
        record.setPassword(users.getPassword());
        record.setFirstname("");
        record.setLastname("");
        record.setRole("user");
        record.setStatus("normal");

        String hashedPassword = passwordEncoder.encode(users.getPassword());
        record.setPassword(hashedPassword);

        repository.save(record);
    }

    public Users getUser(String username) {
        return repository.findByUsername(username);
    }

    public void updateUser(Users users, HashMap<String, String> params) {
        String username = users.getUsername();
        RestTemplate restTemplate = new RestTemplate();

        String url = "https://habaanhainong-final-project.vercel.app/api/api/edit-profile/" + username;
        JSONObject jsonObject = new JSONObject();

        System.out.println(params);
        jsonObject.put("firstname", params.get("firstname"));
        jsonObject.put("lastname", params.get("lastname"));
        jsonObject.put("phone_no", params.get("phone_no"));
        jsonObject.put("facebook", params.get("facebook"));
        jsonObject.put("instagram", params.get("instagram"));
        jsonObject.put("line", params.get("line"));

        HttpHeaders headers = new HttpHeaders();
        headers.setContentType(MediaType.APPLICATION_JSON);

        HttpEntity<String> req = new HttpEntity<>(jsonObject.toString(), headers);
        restTemplate.exchange(url, HttpMethod.PUT, req, Object.class);
    }
}
