package ku.cs.habaanhainong.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class MyPetController {
    @GetMapping("/my-pet")
    public String getMyPet(Model model){
        return "my-pet";
    }
}
