package ku.cs.habaanhainong.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;

import java.util.ArrayList;

@Controller
public class ApplicantViewController {
    @RequestMapping("/applicant-view")
    public String getApplicantPage(Model model){
        return "applicant-view";
    }
}
