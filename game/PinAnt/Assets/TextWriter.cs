using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class TextWriter : MonoBehaviour
{

    public float letterPause;
    private string message = "Hallo, welkom bij PinAnt! \n Meld je aan met je A-account om te starten! Geen A-account? Druk op registreren om er snel één aan te maken!";
    public Text textComp;
    public GameObject blockPanel;
    private bool isComplete = false;

    // Use this for initialization
    void Start()
    {
        textComp.text = "";
        StartCoroutine(TypeText());

        
    }
    
    void Update()
    {
        if(blockPanel.activeSelf == false)
        {
            CompleteText();
        }
    }
    

    IEnumerator TypeText()
    {
        while (!isComplete)
        {
            foreach (char letter in message.ToCharArray())
            {
                int rd = Random.Range(1, 3);
                textComp.text += letter;

                yield return 0;
                yield return new WaitForSeconds(letterPause);

                if (textComp.text == message)
                {
                    isComplete = true;
                    blockPanel.SetActive(false);
                    break;
                }
            }
            
        }
        
    }

    void CompleteText()
    {
        isComplete = true;
        textComp.text = message;
    }

    
}