package ku.cs.habaanhainong.service;

import org.springframework.web.client.RestTemplate;

public class PostAllService {

    public Object getAllPost() {
        RestTemplate restTemplate = new RestTemplate();
        String resourceUrl = APIServices.BASE_URL + "posts";
        return restTemplate.getForObject(resourceUrl, Object.class);
    }

    public Object getPost(){
        RestTemplate restTemplate = new RestTemplate();
        String resourceUrl = APIServices.BASE_URL + "posts";
        return restTemplate.getForObject(resourceUrl, Object.class);
    }
}
