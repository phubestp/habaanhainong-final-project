package ku.cs.habaanhainong;

import io.github.bonigarcia.wdm.WebDriverManager;
import org.junit.jupiter.api.*;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.FindBy;
import org.openqa.selenium.support.PageFactory;
import org.openqa.selenium.support.ui.WebDriverWait;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.boot.test.web.server.LocalServerPort;


import java.time.Duration;


import static org.junit.jupiter.api.Assertions.assertEquals;

import java.time.Duration;

@SpringBootTest(webEnvironment = SpringBootTest.WebEnvironment.RANDOM_PORT)
public class RegisterTest {

    @LocalServerPort
    private Integer port;

    private static WebDriver driver;
    private static WebDriverWait wait;

    @FindBy(id = "username") private WebElement usernameField;
    @FindBy(id = "password") private WebElement passwordField;
    @FindBy(id = "confirmPassword") private WebElement confirmPasswordField;
    @FindBy(id = "submitButton") private WebElement submitButton;
    @FindBy(id = "firstname") private WebElement firstnameField;
    @FindBy(id = "lastname") private WebElement lastnameField;
    @FindBy(id = "phone_no") private WebElement phoneNoField;
    @FindBy(id = "facebook") private WebElement facebookField;
    @FindBy(id = "instagram") private WebElement instagramField;
    @FindBy(id = "line") private WebElement lineField;
    @FindBy(id = "submitRegisterBtn") private WebElement submitRegisterBtn;
    @FindBy(id = "privacyPolicyAndTermOfService") private WebElement privacyPolicyAndTermOfServiceCheckbox;

    @BeforeAll
    public static void beforeAll() {
        WebDriverManager.chromedriver().setup();
        driver = new ChromeDriver();
        wait = new WebDriverWait(driver, Duration.ofSeconds(1));
    }

    @BeforeEach
    public void beforeEach() {
        driver.get("http://localhost:" + port + "/register");
        PageFactory.initElements(driver, this);
    }

    @AfterEach
    public void afterEach() throws InterruptedException {
        Thread.sleep(3000);
    }

    @AfterAll
    public static void afterAll() {
        if (driver != null)
            driver.quit();
    }

    @Test
    void testRegister() {
        usernameField.sendKeys("Usertester");
        passwordField.sendKeys("password1234");
        confirmPasswordField.sendKeys("password1234");

        submitButton.click();

        firstnameField.sendKeys("tester");
        lastnameField.sendKeys("register");
        phoneNoField.sendKeys("1234567890");
        facebookField.sendKeys("facebook");
        instagramField.sendKeys("instagram");
        lineField.sendKeys("line");

        privacyPolicyAndTermOfServiceCheckbox.click();

        submitRegisterBtn.click();
    }


}
