package ku.cs.habaanhainong.controller;

import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

public class MyPostController {
    @GetMapping("/my-post")
    public String getAnimalType(Model animalTypes){
        return "my-post";
    }
}
