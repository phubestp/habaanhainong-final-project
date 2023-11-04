package ku.cs.habaanhainong.service;

import org.springframework.http.HttpEntity;
import org.springframework.web.client.RestTemplate;

public class APIServices {

    private static final String BASE_URL
            = "https://habaanhainong-final-project-git-template-phubestps-projects.vercel.app/api/api/";

    public static Object getAnimals() {
        RestTemplate restTemplate = new RestTemplate();
        String resourceUrl = BASE_URL + "animals";
        return restTemplate.getForObject(resourceUrl, Object.class);
    }

    public static void addAnimal(HttpEntity<String> req) {
        RestTemplate restTemplate = new RestTemplate();
        String resourceUrl = BASE_URL + "animals";
        System.out.println(restTemplate.postForObject(resourceUrl,req, Object.class));
    }



}
