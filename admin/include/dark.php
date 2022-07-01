<button class="btn bg-dark  text-light " type="button" style="height:60px;float: right;" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-grid-3x3-gap-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2zM1 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V7zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V7zM1 12a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-2z"/>
                          </svg>
                    </button>
                    <div class="dropdown-menu shadow"
                     style="
                     z-index: 1000;
                      width: 400px;
                      border-radius: 10px;
                      margin: 10px;
                      " 
                     aria-labelledby="dropdownMenuButton">
                     <br>
                        <div class="mx-auto" 
                        style="height: 100px;
                        width: 100px;
                        background:url(../img/FFC-icon.png);
                        background-size: cover;
                        ">
                        </div>
                        <br>
                        <center>
                            <h6 class="text-success"> 
                                <strong class="text-info" style="font-size: 20px;"><?=$_SESSION['Club']?></strong> <br>
                                <?=$_SESSION['Email']?></h6>
                        <a name="" id="" class="btn btn-light border rounded-pill "  href="#" role="button"> 
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-grid-1x2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6 1H1v14h5V1zm9 0h-5v5h5V1zm0 9h-5v5h5v-5zM0 1a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm9 0a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1V1zm1 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1h-5z"/>
                              </svg>
                                Gérer votre Compte
                            </a>
                        </center>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-center "  href="deconnexion.php">
                            <svg width="1.5em" height="1.5em" class="text-danger" viewBox="0 0 16 16" class="bi bi-power" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.578 4.437a5 5 0 1 0 4.922.044l.5-.866a6 6 0 1 1-5.908-.053l.486.875z"/>
                                <path fill-rule="evenodd" d="M7.5 8V1h1v7h-1z"/>
                              </svg>
                           <h6>Deconnexion</h6> 
                            
                        </a>
                    </div>
                <!-- MENU DARCK -->

            </div>
            
            
        </div>