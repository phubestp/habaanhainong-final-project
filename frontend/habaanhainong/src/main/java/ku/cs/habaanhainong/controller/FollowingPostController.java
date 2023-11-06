package ku.cs.habaanhainong.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

import java.util.ArrayList;

@Controller
public class FollowingPostController {
    
    @GetMapping("/following-post")
    public String getAnimalType(Model animalTypes){
        return "following-post";
    }
}
