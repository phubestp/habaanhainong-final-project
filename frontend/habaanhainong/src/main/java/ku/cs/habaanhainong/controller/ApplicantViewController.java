package ku.cs.habaanhainong.controller;

import ku.cs.habaanhainong.service.ApplicantService;
import ku.cs.habaanhainong.service.PostService;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;

import java.util.ArrayList;
import java.util.HashMap;

@Controller
public class ApplicantViewController {

    ApplicantService applicantService = new ApplicantService();
    @RequestMapping("/applicant-view/{post_id}")
    public String getApplicantPage(Model model, @PathVariable String post_id){
        model.addAttribute("applicants", applicantService.getAllApplicant(post_id));
        return "applicant-view";
    }
}
