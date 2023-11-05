package ku.cs.habaanhainong.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;

import java.util.ArrayList;
import java.util.HashMap;

@Controller
public class ApplicantViewController {

    @RequestMapping("/applicant-view")
    public String getApplicantPage(Model model){
        ArrayList<HashMap<String,String>> applicant = new ArrayList<>();
        for (int i = 0; i < 2; i++){
            HashMap<String,String> info = new HashMap<>();
            info.put("name", "น้องแมวซุกซน");
            info.put("reason", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.");
            info.put("tel", "0000000");
            info.put("facebook", "abc");
            info.put("instagram", "def");
            applicant.add(info);
        }
        model.addAttribute("applicants", applicant);
        return "applicant-view";
    }
}
