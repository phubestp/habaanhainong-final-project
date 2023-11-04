package ku.cs.habaanhainong.controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
public class HomeController {

    @RequestMapping("/")
    public String getHomePage() {
        return "redirect:/post-manage";
//        return "applicant-view";
//        return "redirect:/animal-type-view";
    }
}