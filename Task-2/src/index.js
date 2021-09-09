import React from 'react';
import ReactDOM from 'react-dom';
import { Route, Link, Switch, BrowserRouter as Router } from "react-router-dom"
import { DiReact } from "react-icons/di";
import { Container, Navbar, NavbarBrand, Button} from 'reactstrap';
import './App.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import App from './App';
import UserCards from './Components/UserCards';
import Footer from './Components/Footer';

const routing = (
  <Router>
    <div>
      <Navbar className="fixed-top" color="dark" expand="lg">
        <Container>
          <NavbarBrand href="#home" style={{ color: 'white' }}>
            <DiReact
              size={40}
              className="icon-spin"
            />
            <Link class="link" exact to="/">User Cards</Link>

          </NavbarBrand>
          <Link class="link" to="/UserCards">
            <Button color="dark" background-color="aqua">Get Users</Button>
            </Link>
        </Container>
      </Navbar>
    </div>
    <Switch>
      <Route exact path="/" component={App} />
      <Route path="/UserCards" component={UserCards} />
    </Switch>
    <Footer />
  </Router>

)
ReactDOM.render(
  routing, document.getElementById('root')
);