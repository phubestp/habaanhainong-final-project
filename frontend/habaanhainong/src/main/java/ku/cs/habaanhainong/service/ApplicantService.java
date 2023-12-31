package ku.cs.habaanhainong.service;

import org.json.JSONObject;
import org.springframework.http.HttpEntity;
import org.springframework.http.HttpHeaders;
import org.springframework.http.MediaType;
import org.springframework.web.client.RestTemplate;

import java.util.HashMap;

public class ApplicantService {
    public void applicant(String username, String postId, String reason) {
        RestTemplate restTemplate = new RestTemplate();
        String url = APIServices.BASE_URL + "applicant";
        HttpHeaders headers = new HttpHeaders();
        headers.setContentType(MediaType.APPLICATION_JSON);
        JSONObject newApplicantJson = new JSONObject();
        newApplicantJson.put("username", username);
        newApplicantJson.put("post_id", postId);
        newApplicantJson.put("reason", reason);
        HttpEntity<String> req = new HttpEntity<>(newApplicantJson.toString(), headers);
        restTemplate.postForObject(url, req, HashMap.class);
    }

    public Object getAllApplicant(String post_id) {
        RestTemplate restTemplate = new RestTemplate();
        String url = APIServices.BASE_URL + "applicants/" + post_id;
        return restTemplate.getForObject(url, Object.class);
    }

    public void accept(String username, String postId) {
        RestTemplate restTemplate = new RestTemplate();
        String url = APIServices.BASE_URL + "accept-applicant";
        HttpHeaders headers = new HttpHeaders();
        headers.setContentType(MediaType.APPLICATION_JSON);
        JSONObject newApplicantJson = new JSONObject();
        newApplicantJson.put("username", username);
        newApplicantJson.put("post_id", postId);
        HttpEntity<String> req = new HttpEntity<>(newApplicantJson.toString(), headers);
        restTemplate.postForObject(url, req, HashMap.class);
    }
}
